<?php
namespace App\BackOffice\Transactions\Application\Actions;

use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\Shared\Utility\JwtCustom;
use DateTime;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Rules\Executable;

class TransactionAddAction extends TransactionsAction
{
    protected function action(): Response
    {
        try {
            // Validate data
            $bodyParsed = $this->getFormData();

            $validateSuccess = $this->transactionService->executeAdd((array)$bodyParsed);

            $customerRequest = (array) $bodyParsed->customer;
            $petsRequest = (array) $bodyParsed->pets;
            $paymentRequest = (array) $bodyParsed->payment;
            $bookingRequest = (array) $bodyParsed->booking;

            if(is_bool($validateSuccess) && $validateSuccess){

                // Validate User
                $authorization = explode(' ', (string)$this->request->getHeaderLine('Authorization'));
                $token = $authorization[1];
                $jwtCustom = new JwtCustom();
                $verify = $jwtCustom->decodeToken($token);
                $id = $verify->data->id;

                // Validate Customer
                $customerRequest['userId'] = $id;
                if($customerRequest['id'] == ""){
                    $this->customerService->executeAdd($customerRequest);
                } else {
                    $this->customerService->executeEdit($customerRequest, $customerRequest['id']);
                }

                // Validate Pets
                foreach ($petsRequest as $petRequest) {
                    $petRequest = (array) $petRequest;
                    $petRequest['customerId'] = $customerRequest['id'];
                    if($petRequest['id'] == ""){
                        unset($petRequest['id']);
                        $this->petService->executeAdd($petRequest);
                    } else {
                        $pet = $this->petService->executeGet($petRequest['id']);
                        if(!is_null($pet)){
                            $this->petService->executeEdit($petRequest, $petRequest['id']);
                        }
                    }
                }

                // Validate Booking
                $kennelsAvailable = $this->getKennelsAvailableForBooking($bookingRequest['dateTo'], $bookingRequest['dateFrom'], $petsRequest);
                    
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
                        "active" => true
                    ];

                    // Add Payment
                    $bookingSuccess = $this->bookingService->executeAdd($request);
                    if(is_object($bookingSuccess)){
                        $this->addPayment($paymentRequest, $customerRequest, $bookingRequest, $bookingSuccess->id);
                    }
                }

            }

            return $this->commandSuccess($this->transactionService->executeAdd((array)$bodyParsed));

        } catch (Exception $ex) {

            return $this->commandError($ex);

        }
    }

    private function addPayment($payment, $customer, $booking, $bookingId) {

        // Validate Payment
        $payment['date']        = date('Y-m-d H:m:s');
        $payment['customerId']  = $customer['id'];
        $payment['bookingId']   = $bookingId;
        $payment['stateId']     = $this->paymentService->paymentStateDefault($payment['paymentMethodId']);
        $payment['bankId']      = "";
        $payment['total']       = $this->transactionService->getTotalTransaction($payment['order'], $booking['dateTo'], $booking['dateFrom']);
        $paymentSuccess = $this->paymentService->executeAdd($payment);
        if(is_object($paymentSuccess)){

            // Validate Payment Order
            $this->addOrderToPayment($paymentSuccess->id, $payment['order'], $booking['dateTo'], $booking['dateFrom']);
        }

    }

    /*
    * Caniles disponibles para la reserva
    * */
    private function getKennelsAvailableForBooking($dateTo, $dateFrom, $pets): array {

        $this->bookingService->getThereKennelAssociatedWithPets($dateTo, $dateFrom, $pets);

        $kennelsNotAvailable = $this->bookingService->getKennelsNotAvailableByDateToAndDateFrom($dateTo, $dateFrom);

        return $this->kennelService->getKennelsAvailable($kennelsNotAvailable, $pets);
    }

    /*
    * Relacionar los servicios con el pago
    * */
    private function addOrderToPayment($paymentId, $order, $dateTo, $dateFrom) {
        foreach ($order as $item) {
            $order = (array) $item;
            $order['quantity'] = $this->transactionService->calculateTheDaysAccommodation($order, $dateTo, $dateFrom);
            $order['subtotal'] = ($order['quantity'] * $order['price']);
            $order['paymentId'] = $paymentId;
            $order['active'] = true;
            $this->paymentOrderService->executeAdd($order);
        }
    }

}