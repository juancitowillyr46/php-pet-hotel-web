<?php
namespace App\BackOffice\Bookings\Application\Actions;

use App\BackOffice\Bookings\Domain\Services\BookingService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class BookingsAction extends Action
{
    public BookingService $bookingService;

    public function __construct(LoggerInterface $logger, BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
        parent::__construct($logger);
    }
}

