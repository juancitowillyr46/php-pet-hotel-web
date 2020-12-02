<?php
namespace App\BackOffice\Transactions\Application\Actions;

use App\BackOffice\Bookings\Domain\Entities\BookingModel;
use App\BackOffice\Customers\Domain\Entities\CustomerModel;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Payments\Domain\Entities\PaymentModel;
use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\BackOffice\Services\Domain\Entities\ServiceModel;
use App\BackOffice\Users\Domain\Entities\UserModel;
use App\Shared\Utility\EmailTplBooking;
use App\Shared\Utility\EmailTplPaymentService;
use App\Shared\Utility\EmailUtil;
use App\Shared\Utility\JwtCustom;
use DateTime;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Rules\Executable;

class TransactionAddServiceAction extends TransactionsAction
{

    public string $serviceId;

    protected function action(): Response
    {
        try {

            $bodyParsed = $this->getFormData();

            $validateSuccess = $this->transactionService->executeAddService((array)$bodyParsed);

            $this->serviceId  = $bodyParsed->serviceId;
            $paymentRequest  = (array) $bodyParsed->payment;
            $orderRequest    = (array) $bodyParsed->order;

            $activeId = $this->transactionService->stateAudit();

            if(is_bool($validateSuccess) && $validateSuccess){

                // -- User -- //
                $getUser = $this->userService->validateByEmail(trim($paymentRequest['billingEmail']));
                $successUser = null;

                if(is_null($getUser)) {

                    $payloadUserAdd = [
                        'email'    => $paymentRequest['billingEmail'],
                        'username' => $paymentRequest['billingEmail'],
                        'password' => $paymentRequest['billingDni'],
                        'roleId'   => 'd2a466ae-d711-496c-9808-ad51abf76175',
                        'active'   => true,
                        'blocked'  => '1cca03ea-07dc-11eb-ab06-50e549398ade2'
                    ];

                    $successUser = $this->userService->executeAdd($payloadUserAdd);

                } else {

                    $successUser = $this->userService->executeGet($getUser['uuid']);
                }

                // -- Customer -- //
                if(is_object($successUser)){

                    $userId = $this->userService->getIdByUuidModel(new UserModel(), $successUser->id);

                    $getCustomer = $this->transactionService->getIdCustomer($userId);

                    $requestCustomer = [
                        "firstName"        => $paymentRequest['billingFirstName'],
                        "lastName"         => $paymentRequest['billingLastName'],
                        "phone"            => "",
                        "address"          => $paymentRequest['billingAddress'],
                        "addressOptional"  => "",
                        "addressReference" => "",
                        "comments"         => "",
                        "userId"           => $successUser->id,
                        "image"            => "",
                        "email"            => $paymentRequest['billingEmail'],
                        "active"           => true,
                        "districtId"       => ""
                    ];

                    if(is_null($getCustomer)){
                        $successCustomer = $this->customerService->executeAdd($requestCustomer);
                    } else {
                        $requestCustomer['id'] = $getCustomer['uuid'];
                        $successCustomer = $this->customerService->executeEdit($requestCustomer, $getCustomer['uuid']);
                    }

                    if(is_object($successCustomer)) {

                        // -- Payment -- //
                        $paymentRequest['order'] = $orderRequest;
                        $paymentRequest['active'] = $activeId == 1;
                        $this->addPayment($paymentRequest, (array) $successCustomer);
                    }
                }

            }


            return $this->commandSuccess($this->transactionService->executeAddService((array)$bodyParsed));

        } catch (Exception $ex) {

            return $this->commandError($ex);

        }
    }

    private function addPayment($payment, $customer) {

        // Validate Payment
        $payment['date']        = date('Y-m-d H:m:s');
        $payment['customerId']  = $customer['id'];
        $payment['stateId']     = $this->paymentService->paymentStateDefault($payment['paymentMethodId']);
        $payment['bankId']      = "";
        $payment['total']       = $this->transactionService->getTotalTransactionService($payment['order']);
        $paymentSuccess         = $this->paymentService->executeAdd($payment);
        if(is_object($paymentSuccess)){

            // Log Payment
            $paymentId = $this->paymentService->getIdByUuidModel(new PaymentModel(), $paymentSuccess->id);
            $serviceId = $this->serviceService->getIdByUuidModel(new ServiceModel(), $this->serviceId);
            $customerId = $this->customerService->getIdByUuidModel(new CustomerModel(), $customer['id']);

            $paymentModel = PaymentModel::find($paymentId);
            $paymentModel->services()->sync([$serviceId => ['created_at' => date('Y-m-d H:i:s'), 'customer_id' => $customerId]]);

            $this->addOrderToPayment($paymentSuccess->id, $payment['order']);

            $getPayment = (array) $this->paymentService->executeGet($paymentSuccess->id);

            // Send Email
            $emailTplPaymentService = new EmailTplPaymentService();
            $emailTplPaymentService->setTicket($getPayment['ticket']);
            $emailTplPaymentService->setTotal($getPayment['total']);
            $emailTplPaymentService->setGridTotal($getPayment['total']);
            $emailTplPaymentService->setStatePayment($getPayment['stateName']);
            $emailTplPaymentService->setMethodPaymentName($getPayment['paymentMethodName']);

            $services = (array) $this->paymentOrderService->executeGetAllDetail(['paymentId' => $getPayment['id']]);
            $emailTplPaymentService->setServices($services);

            $subject = 'Pago registrado';
            $body = $emailTplPaymentService->getContent();
            $witMailer = new EmailUtil($this->logger);
            $witMailer->sendEmail($payment['billingEmail'], $payment['billingFirstName'], $subject, $body);
        }

    }

    private function addOrderToPayment($paymentId, $order) {
        foreach ($order as $item) {
            $order = (array) $item;
            $order['subtotal']  = ($order['quantity'] * $order['price']);
            $order['paymentId'] = $paymentId;
            $order['active']    = $this->transactionService->stateAudit() == 1;
            $this->paymentOrderService->executeAdd($order);
        }
    }

}