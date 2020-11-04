<?php
namespace App\BackOffice\Customers\Application\Actions;

use App\BackOffice\Customers\Domain\Services\CustomerService;
use App\BackOffice\Pets\Domain\Services\PetService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class CustomersAction extends Action
{
    public CustomerService $customerService;
    public PetService $petService;

    public function __construct(LoggerInterface $logger, CustomerService $customerService, PetService $petService)
    {
        $this->petService = $petService;
        $this->customerService = $customerService;
        parent::__construct($logger);
    }
}

