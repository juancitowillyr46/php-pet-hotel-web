<?php
namespace App\BackOffice\Bookings\Application\Actions;


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
                $success->payment = $this->paymentService->executeGetByBookingId($success->id);
                $success->payment->orders = [];
                if(is_object($success->payment)){
                    $success->payment->orders = $this->paymentOrderService->executeGetAllDetail(['paymentId' => $success->payment->id]);
                }
            }
            return $this->commandSuccess($success);
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}