<?php
namespace App\BackOffice\Payments\Application\Actions;

use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\Shared\Utility\EmailTplPayment;
use App\Shared\Utility\EmailTplPaymentServiceConfirm;
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
                    $paymentSuccess = $this->paymentService->executeGet($getPayment['id']);
                    $paymentSuccess = (array) $paymentSuccess;
                    $body = '';
                    $services = [];

                    if($getPayment['stateId'] == '1cca03ea-07dc-11eb-ab06-50e549398ade5'){

                        $validateTplEmail = $this->paymentService->executeValidateTplSendMail((int) $getPayment['ticket']);

                        // Booking
                        if($validateTplEmail == 1){

                            $emailTpl = new EmailTplPayment();

                            // Bookings
                            $emailBookings = [];
                            $bookings = $this->paymentService->executeGetBookingIds((int) $getPayment['ticket']);
                            foreach ($bookings as $booking) {
                                $petFind = $this->petService->getRowByIdModel(new PetModel(), $booking['pet_id']);
                                $emailBookings[] = ['pet' => $petFind['name'], 'booking' => $booking];
                            }


                            $emailTpl->setMethodPaymentName($paymentSuccess['paymentMethodName']);
                            $emailTpl->setTicket($paymentSuccess['ticket']);
                            $emailTpl->setStatePayment($paymentSuccess['stateName']);
                            $emailTpl->setGridTotal($paymentSuccess['total']);
                            $emailTpl->setTotal($paymentSuccess['total']);
                            $emailTpl->setBookings($emailBookings);
                            $services = (array) $this->paymentOrderService->executeGetAllDetail(['paymentId' => $getPayment['id']]);
                            $emailTpl->setServices($services);

                            $body = $emailTpl->getContent();

                        // Services
                        } else if($validateTplEmail == 2){

                            $emailTpl = new EmailTplPaymentServiceConfirm();
                            $emailTpl->setMethodPaymentName($paymentSuccess['paymentMethodName']);
                            $emailTpl->setTicket($paymentSuccess['ticket']);
                            $emailTpl->setStatePayment($paymentSuccess['stateName']);
                            $emailTpl->setGridTotal($paymentSuccess['total']);
                            $emailTpl->setTotal($paymentSuccess['total']);
                            $services = (array) $this->paymentOrderService->executeGetAllDetail(['paymentId' => $getPayment['id']]);
                            $emailTpl->setServices($services);
                            $body = $emailTpl->getContent();
                        }

                        $subject = 'Pago confirmado';
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