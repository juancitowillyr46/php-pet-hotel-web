<?php
namespace App\BackOffice\Transactions\Infrastructure\Persistence;

use App\BackOffice\Transactions\Domain\Entities\TransactionModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class TransactionRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new TransactionModel());
    }
}