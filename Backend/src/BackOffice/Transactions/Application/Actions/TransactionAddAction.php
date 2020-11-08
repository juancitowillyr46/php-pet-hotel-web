<?php
namespace App\BackOffice\Transactions\Application\Actions;

use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\Shared\Utility\JwtCustom;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class TransactionAddAction extends TransactionsAction
{
    protected function action(): Response
    {
        try {
            // Validate data
            $bodyParsed = $this->getFormData();

            $validateSuccess = $this->transactionService->executeAdd((array)$bodyParsed);

            $petsRequest = (array) $bodyParsed->pets;
            $customerRequest = (array) $bodyParsed->customer;
            $paymentRequest = (array) $bodyParsed->payment;
            $bookingsRequest = (array) $bodyParsed->booking;

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
                foreach ($petsRequest as $index => $value) {
                    $bookingRequest = (array) $bookingsRequest[$index];
                    $petRequest = (array) $petsRequest[$index];
                    $request = [
                        "kennelId" => $bookingRequest['kennelId'],
                        "stateId" => "9e3e0581-e0fd-4af9-8699-f7ea3521f1ae",
                        "petId" => $petRequest['id'],
                        "customerId" => $customerRequest['id'],
                        "dateTo" => $bookingRequest['dateTo'],
                        "dateFrom" => $bookingRequest['dateFrom'],
                        "cancellationDate" => "",
                        "cancellationNote" => "",
                        "active" => true
                    ];
                    $success = $this->bookingService->executeAdd($request);
                    if($success){
                        $this->payment($paymentRequest, $petsRequest, $customerRequest, $success->id);
                    }
                }


            }

            return $this->commandSuccess($this->transactionService->executeAdd((array)$bodyParsed));

        } catch (Exception $ex) {

            return $this->commandError($ex);

        }
    }

    private function payment($paymentRequest, $petsRequest, $customerRequest, $bookingId) {

        // Validate Payment
        $countPets = count($petsRequest);
        $paymentRequest['date'] = date('Y-m-d H:m:s');
        $paymentRequest['customerId'] = $customerRequest['id'];
        $paymentRequest['bookingId'] = $bookingId;

        // Validate payment method
        if($paymentRequest['paymentMethodId']){

            $paymentMethodIdRow = $this->paymentService->getAttrByUuidModel(new DataMasterModel(), $paymentRequest['paymentMethodId'], 'id_row');
            $idRow = (int) $paymentMethodIdRow;

            // Tranferencia Bancaria
            if($idRow == 1) {
                $paymentRequest['stateId'] = '1cca03ea-07dc-11eb-ab06-50e549398ade6';
                // Plin o Lukita
            } else if($idRow == 2) {
                $paymentRequest['stateId'] = '1cca03ea-07dc-11eb-ab06-50e549398ade6';
                // Yape
            } else if($idRow == 3) {
                $paymentRequest['stateId'] = '1cca03ea-07dc-11eb-ab06-50e549398ade6';
                // POS
            } else if($idRow == 4) {
                $paymentRequest['stateId'] = '1cca03ea-07dc-11eb-ab06-50e549398ade6';
            }
            $paymentRequest['bankId'] = "";
        }

        $total = 0;

        foreach ($paymentRequest['order'] as $order) {
            $order = (array) $order;

            $quantity = 1;
            if($order['serviceId'] == '1fdcf8ea-199c-11eb-aed1-50e549398ade'){
                // TODO: sacar los días entre dos fechas
                $quantity = 2;
            }

            $order['quantity'] = $quantity;
            $order['subtotal'] = ($order['quantity'] * $order['price']);
            $total = $total + $order['subtotal'];
        }

        $paymentRequest['total'] = $total;

        $success = $this->paymentService->executeAdd($paymentRequest);

        foreach ($paymentRequest['order'] as $order) {
            $order = (array) $order;

            $quantity = 1;
            if($order['serviceId'] == '1fdcf8ea-199c-11eb-aed1-50e549398ade'){
                // TODO: sacar los días entre dos fechas
                $quantity = 2;
            }

            $order['quantity'] = $quantity;
            $order['subtotal'] = ($order['quantity'] * $order['price']);
            $order['paymentId'] = $success->id;
            $order['active'] = true;
            $this->paymentOrderService->executeAdd($order);
        }
    }
}