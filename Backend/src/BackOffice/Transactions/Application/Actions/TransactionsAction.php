<?php
namespace App\BackOffice\Transactions\Application\Actions;

use App\BackOffice\Bookings\Domain\Services\BookingService;
use App\BackOffice\Customers\Domain\Services\CustomerService;
use App\BackOffice\Payments\Domain\Services\PaymentOrderService;
use App\BackOffice\Payments\Domain\Services\PaymentService;
use App\BackOffice\Pets\Domain\Services\PetService;
use App\BackOffice\Transactions\Domain\Services\TransactionService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class TransactionsAction extends Action
{
    public TransactionService $transactionService;
    public CustomerService $customerService;
    public PetService $petService;
    public PaymentService $paymentService;
    public PaymentOrderService $paymentOrderService;
    public BookingService $bookingService;

    public function __construct(
        LoggerInterface $logger,
        TransactionService $transactionService,
        CustomerService $customerService,
        PetService $petService,
        PaymentService $paymentService,
        PaymentOrderService $paymentOrderService,
        BookingService $bookingService
    )
    {
        $this->customerService = $customerService;
        $this->transactionService = $transactionService;
        $this->petService = $petService;
        $this->paymentService = $paymentService;
        $this->paymentOrderService = $paymentOrderService;
        $this->bookingService = $bookingService;
        parent::__construct($logger);
    }
}

