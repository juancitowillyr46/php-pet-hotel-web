<?php
namespace App\BackOffice\Transactions\Domain\Services;

use App\BackOffice\Transactions\Domain\Entities\TransactionEntity;
use App\BackOffice\Transactions\Domain\Entities\TransactionMapper;
use App\BackOffice\Transactions\Infrastructure\Persistence\TransactionRepository;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class TransactionService extends BaseService
{
    protected TransactionEntity $transactionEntity;
    protected TransactionRepository $transactionRepository;
    protected TransactionMapper $transactionMapper;

    public function __construct(LoggerInterface $loggerInterface, TransactionRepository $transactionRepository, TransactionEntity $transactionEntity, TransactionMapper $transactionMapper)
    {
        $this->transactionEntity = $transactionEntity;
        $this->transactionRepository = $transactionRepository;
        $this->transactionMapper = $transactionMapper;
        parent::__construct($loggerInterface, $transactionRepository);
    }

    public function executeAdd(array $request): bool {
        $this->transactionEntity->payload((object)$request);
        return true;
    }

}