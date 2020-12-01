<?php
namespace App\BackOffice\Payments\Application\Actions;

use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\Shared\Utility\EmailTplPayment;
use App\Shared\Utility\EmailUtil;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class PaymentEditStateAction extends PaymentsAction
{
    protected function action(): Response
    {
        try {

            $argUuid = $this->resolveArg('uuid');
            $bodyParsed = $this->getFormData();

            $successState = $this->paymentService->executeEditState((array)$bodyParsed, $argUuid);

            if(is_object($successState)) {
                try {

                    $getPayment = $this->paymentService->executeGet($successState->id);
                    $getPayment = (array) $getPayment;
                    if($getPayment['stateId'] == '1cca03ea-07dc-11eb-ab06-50e549398ade5'){

                        $subject = 'Pago confirmado';

                        $emailTpl = new EmailTplPayment();

                        // Bookings
                        $emailBookings = [];
                        $bookings = $this->paymentService->executeGetBookingIds((int) $getPayment['ticket']);
                        foreach ($bookings as $booking) {
                            $petFind = $this->petService->getRowByIdModel(new PetModel(), $booking['pet_id']);
                            $emailBookings[] = ['pet' => $petFind['name'], 'booking' => $booking];
                        }

                        // Payment
                        $services = [];
                        $body = '';
                        $paymentSuccess = $this->paymentService->executeGet($getPayment['id']);
                        if(is_object($paymentSuccess)){
                            $paymentSuccess = (array) $paymentSuccess;
                            $emailTpl->setMethodPaymentName($paymentSuccess['paymentMethodName']);
                            $emailTpl->setTicket($paymentSuccess['ticket']);
                            $emailTpl->setStatePayment($paymentSuccess['stateName']);
                            $emailTpl->setGridTotal($paymentSuccess['total']);
                            $emailTpl->setTotal($paymentSuccess['total']);
                            $emailTpl->setBookings($emailBookings);
                            $services = (array) $this->paymentOrderService->executeGetAllDetail(['paymentId' => $getPayment['id']]);
                            $emailTpl->setServices($services);
                        }

                        $body = $emailTpl->getContent();
                        $witMailer = new EmailUtil($this->logger);
                        $witMailer->sendEmail($getPayment['billingEmail'], $getPayment['billingFirstName'] , $subject, $body);
                    }

                } catch (Exception $e) {
                    $this->logger->error('No envio correo');
                }
            }

            return $this->commandSuccess($successState);

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}