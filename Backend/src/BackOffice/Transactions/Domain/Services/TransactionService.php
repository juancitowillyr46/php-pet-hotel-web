<?php
namespace App\BackOffice\Transactions\Domain\Services;

use App\BackOffice\Transactions\Domain\Entities\TransactionEntity;
use App\BackOffice\Transactions\Domain\Entities\TransactionMapper;
use App\BackOffice\Transactions\Infrastructure\Persistence\TransactionRepository;
use App\Shared\Domain\Services\BaseService;
use DateTime;
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

    public function getDateDayDiff($dateTo, $dateFrom): int {
        $dateToC = new DateTime($dateTo);
        $dateFromC = new DateTime($dateFrom);
        $diff = $dateToC->diff($dateFromC);
        return (int) $diff->days;
    }

    public function calculateTheDaysAccommodation($order, $dateTo, $dateFrom) {
        $quantity = 1;
        if($order['serviceId'] == '1fdcf8ea-199c-11eb-aed1-50e549398ade'){
            $quantity = $this->getDateDayDiff($dateTo, $dateFrom);
        }
        return $quantity;
    }

    public function getTotalTransaction($order, $dateTo, $dateFrom): float {
        $total = 0;
        foreach ($order as $item) {
            $order = (array) $item;
            $order['quantity'] = $this->calculateTheDaysAccommodation($order, $dateTo, $dateFrom);
            $order['subtotal'] = ($order['quantity'] * $order['price']);
            $total = $total + $order['subtotal'];
        }
        return $total;
    }


}