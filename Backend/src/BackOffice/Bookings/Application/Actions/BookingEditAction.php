<?php
namespace App\BackOffice\Bookings\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class BookingEditAction extends BookingsAction
{
    protected function action(): Response
    {
        try {

            $argUuid = $this->resolveArg('uuid');
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->bookingService->executeEdit((array)$bodyParsed, $argUuid));

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}