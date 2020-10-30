<?php
namespace App\BackOffice\Customers\Application\Actions;

use App\BackOffice\Customers\Domain\Services\CustomerService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class CustomersAction extends Action
{
    public CustomerService $customerService;

    public function __construct(LoggerInterface $logger, CustomerService $customerService)
    {
        $this->customerService = $customerService;
        parent::__construct($logger);
    }
}

