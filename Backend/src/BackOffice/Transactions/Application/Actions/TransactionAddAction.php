<?php
namespace App\BackOffice\Transactions\Application\Actions;

use App\BackOffice\Bookings\Domain\Entities\BookingModel;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Payments\Domain\Entities\PaymentModel;
use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\BackOffice\Users\Domain\Entities\UserModel;
use App\Shared\Utility\EmailTplBooking;
use App\Shared\Utility\EmailUtil;
use App\Shared\Utility\JwtCustom;
use DateTime;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Rules\Executable;

class TransactionAddAction extends TransactionsAction
{
    public string $paymentUuid;

    protected function action(): Response
    {
        try {

            $bodyParsed = $this->getFormData();

            $validateSuccess = $this->transactionService->executeAdd((array)$bodyParsed);

            $customerRequest = (array) $bodyParsed->customer;
            $petsRequest     = (array) $bodyParsed->pets;
            $paymentRequest  = (array) $bodyParsed->payment;
            $bookingRequest  = (array) $bodyParsed->booking;
            $orderRequest    = (array) $bodyParsed->order;

            $bookingsUuid = [];

            // State Audit
            $activeId = $this->transactionService->stateAudit();

            if(is_bool($validateSuccess) && $validateSuccess){

                // -- Validate User -- //
                $authorization = explode(' ', (string)$this->request->getHeaderLine('Authorization'));
                $token = $authorization[1];
                $jwtCustom = new JwtCustom();
                $verify = $jwtCustom->decodeToken($token);
                $userUuid = $verify->data->id;
                $userIdInt = $this->userService->getIdByUuidModel(new UserModel(), $userUuid);
                // -- Validate User -- //

                // -- Validate Customer -- //
                $getCustomer = $this->transactionService->getIdCustomer($userIdInt);

                $customerRequest['userId'] = $userUuid;
                $customerRequest['active'] = $activeId == 1;
                $customerRequest['id'] = ($getCustomer != null)? $getCustomer['uuid'] : "";

                if($customerRequest['id'] == ""){
                    unset($customerRequest['id']);
                    $successCustomer = $this->customerService->executeAdd($customerRequest);
                    $customerRequest['id'] = $successCustomer->id;
                } else {
                    $this->customerService->executeEdit($customerRequest, $customerRequest['id']);
                }
                // -- Validate Customer -- //

                // -- Validate Pets -- //
                foreach ($petsRequest as $index => $value) {
                    $petRequest = (array) $petsRequest[$index];
                    $petRequest['active'] = $activeId == 1;
                    $petRequest['customerId'] = $customerRequest['id'];

                    if($petRequest['id'] == ""){
                        unset($petRequest['id']);
                        $successPet = $this->petService->executeAdd($petRequest);
//                        $petRequest['id'] = $successPet->id;
                        $petsRequest[$index]->id = $successPet->id;
                    } else {
                        $pet = $this->petService->executeGet($petRequest['id']);
                        if(!is_null($pet)){
                            $this->petService->executeEdit($petRequest, $petRequest['id']);
                        }
                    }
                }
                // -- Validate Pets -- //

                // Validate Booking
                $kennelsAvailable = $this->getKennelsAvailableForBooking($bookingRequest['dateTo'], $bookingRequest['dateFrom'], $petsRequest);

                $listBookingUuid = [];

                foreach ($petsRequest as $index => $value) {

                    $petRequest = (array) $petsRequest[$index];

                    $request = [
                        "kennelId" => $kennelsAvailable[$index]['uuid'],
                        "stateId" => $this->bookingService->getBookingStateForDefault(),
                        "petId" => $petRequest['id'],
                        "customerId" => $customerRequest['id'],
                        "dateTo" => $bookingRequest['dateTo'],
                        "dateFrom" => $bookingRequest['dateFrom'],
                        "cancellationDate" => "",
                        "cancellationNote" => "",
                        "active" => $activeId == 1
                    ];

                    // Add Payment
                    $bookingSuccess = $this->bookingService->executeAdd($request);
                    if(is_object($bookingSuccess)){
                        $paymentRequest['order'] = $orderRequest;
                        $paymentRequest['active'] = $activeId == 1;
                        $listBookingUuid[] = $bookingSuccess->id;
                        $bookingsUuid[] = $bookingSuccess->id;
                    }
                }

                if(count($listBookingUuid) > 0) {
                    $this->addPayment($paymentRequest, $customerRequest, $bookingRequest, $listBookingUuid);
                }

            }


            $pets = [];
            foreach ($bookingsUuid as $booking) {
                // Booking Get Register
                $getBookingSuccess = (array) $this->bookingService->executeGet($booking);
                if(count($getBookingSuccess) > 0){
                    // Pet Get Register
                    $successPets = (array) $this->petService->executeGet($getBookingSuccess['petId']);
                    $pets[] = $successPets['name'];
                }

            }

            // Payment Register
            $services = [];
            $paymentSuccess = $this->paymentService->executeGet($this->paymentUuid);
            if(is_object($paymentSuccess)){
                $services = (array) $this->paymentOrderService->executeGetAllDetail(['paymentId' => $this->paymentUuid]);
            }

            $subject = 'Reserva registrada';
            $emailTpl = new EmailTplBooking();
            $emailTpl->setCheckIn($bookingRequest['dateFrom']);
            $emailTpl->setCheckOut($bookingRequest['dateTo']);
            $emailTpl->setServices($services);
            $emailTpl->setTotal($paymentSuccess->total);
            $emailTpl->setPets($pets);
            $body = $emailTpl->getContent();

            $witMailer = new EmailUtil($this->logger);
            $witMailer->sendEmail($customerRequest['email'], $customerRequest['firstName'] , $subject, $body);

            return $this->commandSuccess($this->transactionService->executeAdd((array)$bodyParsed));

        } catch (Exception $ex) {

            return $this->commandError($ex);

        }
    }

    private function addPayment($payment, $customer, $booking, $listBookingUuid) {

        $numPets = (int) $booking['numPets'];
        $numDays = $this->transactionService->getDateDayDiff($booking['dateFrom'], $booking['dateTo']);

        $paymentUuid = "";

        // Validate Payment
        $payment['date']        = date('Y-m-d H:m:s');
        $payment['customerId']  = $customer['id'];
        $payment['stateId']     = $this->paymentService->paymentStateDefault($payment['paymentMethodId']);
        $payment['bankId']      = "";
        $payment['total']       = $this->transactionService->getTotalTransaction($payment['order'], $numDays, $numPets);
        $paymentSuccess         = $this->paymentService->executeAdd($payment);
        if(is_object($paymentSuccess)){
            $paymentUuid = $paymentSuccess->id;
            $this->paymentUuid = $paymentSuccess->id;
            $this->addOrderToPayment($paymentSuccess->id, $payment['order'], $numDays, $numPets);
        }

        if($paymentUuid != "") {

            $paymentId = $this->paymentService->getIdByUuidModel(new PaymentModel(), $paymentUuid);

            $listBookingIds = [];
            foreach ($listBookingUuid as $uuid) {
                $listBookingIds[] = $this->bookingService->getIdByUuidModel(new BookingModel(),$uuid);
            }

            $paymentModel = PaymentModel::find($paymentId);
            $paymentModel->bookings()->sync($listBookingIds);
        }

    }

    /*
    * Caniles disponibles para la reserva
    * */
    private function getKennelsAvailableForBooking($dateTo, $dateFrom, $pets): array {

        $this->bookingService->getThereKennelAssociatedWithPets($dateTo, $dateFrom, $pets);

        $kennelsNotAvailable = $this->bookingService->getKennelsNotAvailableByDateToAndDateFrom($dateTo, $dateFrom);

        $getKennels = array_values($this->kennelService->getKennelsAvailable($kennelsNotAvailable, $pets));

        return $getKennels;
    }

    /*
    * Relacionar los servicios con el pago
    * */
    private function addOrderToPayment($paymentId, $order, $numDays, $numPets) {

        foreach ($order as $item) {
            $order = (array) $item;

            // Service Hospedaje
            if($order['serviceId'] == '1fdcf8ea-199c-11eb-aed1-50e549398ade') {
                for($i = 1; $i <= $numPets; $i++){
                    $order['quantity']  = $numDays;
                    $order['subtotal']  = ($numDays * $order['price']);
                    $order['paymentId'] = $paymentId;
                    $order['active']    = $this->transactionService->stateAudit() == 1;
                    $this->paymentOrderService->executeAdd($order);
                }
            } else {
                $order['subtotal']  = ($order['quantity'] * $order['price']);
                $order['paymentId'] = $paymentId;
                $order['active']    = $this->transactionService->stateAudit() == 1;
                $this->paymentOrderService->executeAdd($order);
            }
        }

    }

}