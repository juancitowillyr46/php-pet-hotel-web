<?php
namespace App\BackOffice\Payments\Application\Actions;


use App\BackOffice\Payments\Domain\Services\PaymentOrderService;
use App\BackOffice\Payments\Domain\Services\PaymentService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class PaymentsAction extends Action
{
    public PaymentService $paymentService;
    public PaymentOrderService $paymentOrderService;

    public function __construct(LoggerInterface $logger, PaymentService $paymentService, PaymentOrderService $paymentOrderService)
    {
        $this->paymentOrderService = $paymentOrderService;
        $this->paymentService = $paymentService;
        parent::__construct($logger);
    }
}

