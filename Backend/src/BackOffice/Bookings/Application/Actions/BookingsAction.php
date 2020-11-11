<?php
namespace App\BackOffice\Bookings\Application\Actions;

use App\BackOffice\Bookings\Domain\Services\BookingService;
use App\BackOffice\Payments\Domain\Services\PaymentOrderService;
use App\BackOffice\Payments\Domain\Services\PaymentService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class BookingsAction extends Action
{
    public BookingService $bookingService;
    public PaymentService $paymentService;
    public PaymentOrderService $paymentOrderService;

    public function __construct(LoggerInterface $logger, BookingService $bookingService, PaymentService $paymentService, PaymentOrderService $paymentOrderService)
    {
        $this->bookingService = $bookingService;
        $this->paymentService = $paymentService;
        $this->paymentOrderService = $paymentOrderService;
        parent::__construct($logger);
    }
}

