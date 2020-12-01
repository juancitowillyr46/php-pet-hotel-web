<?php
namespace App\BackOffice\Bookings\Application\Actions;


use App\BackOffice\Bookings\Domain\Entities\BookingModel;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class BookingFindAction extends BookingsAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            $success = $this->bookingService->executeGet($argUuid);
            if(is_object($success)){

                $bookingId = $this->bookingService->getIdByUuidModel(new BookingModel(), $success->id);

                $payments = $this->bookingService->executeGetPaymentIds($bookingId);

                $paymentDto = $this->paymentService->executeGet($payments[0]['uuid']);


                $success->payment = (array) $paymentDto;
                //$success->payment = $this->paymentService->executeGetByBookingId($payments[0]);
                $success->payment['orders'] = [];
                if($success->payment){
                    $success->payment['orders'] = $this->paymentOrderService->executeGetAllDetail(['paymentId' => $payments[0]['uuid']]);
                }
            }
            return $this->commandSuccess($success);
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}