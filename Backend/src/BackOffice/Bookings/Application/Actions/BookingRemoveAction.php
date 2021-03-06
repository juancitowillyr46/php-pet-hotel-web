<?php
namespace App\BackOffice\Bookings\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class BookingRemoveAction extends BookingsAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->bookingService->executeRemove($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}