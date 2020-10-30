<?php
namespace App\BackOffice\Customers\Infrastructure\Persistence;

use App\BackOffice\Customers\Domain\Entities\CustomerModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class CustomerRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new CustomerModel());
    }
}