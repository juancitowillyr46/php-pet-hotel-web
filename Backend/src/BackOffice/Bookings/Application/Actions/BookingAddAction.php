<?php
namespace App\BackOffice\Bookings\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class BookingAddAction extends BookingsAction
{
    protected function action(): Response
    {
        try {
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->bookingService->executeAdd((array)$bodyParsed));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}