<?php
namespace App\BackOffice\Transactions\Domain\Services;

use App\BackOffice\Customers\Domain\Entities\CustomerModel;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Transactions\Domain\Entities\TransactionEntity;
use App\BackOffice\Transactions\Domain\Entities\TransactionMapper;
use App\BackOffice\Transactions\Infrastructure\Persistence\TransactionRepository;
use App\Shared\Domain\Services\BaseService;
use DateInterval;
use DatePeriod;
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

    public function executeAddService(array $request): bool {
        $this->transactionEntity->payloadService((object)$request);
        return true;
    }

    public function getDateDayDiff($dateFrom, $dateTo): int {

        $dates = [];
        $period = new DatePeriod(new DateTime($dateFrom.' 00:00:00'), new DateInterval('P1D'), new DateTime($dateTo.' 23:59:00'));
        foreach ($period as $date) {
            $dates[] = $date->format("Y-m-d");
        }
        return count($dates);
        //  $dateFromC = new DateTime($dateTo . '23:59:00');
        //  $dateToC = new DateTime($dateFrom . '23:59:00');
        //  $diff = $dateFromC->diff($dateToC);
        //  return (int) $diff->days;
    }

//    public function calculateTheDaysAccommodation($order, $dateTo, $dateFrom) {
//        $quantity = 1;
//        if($order['serviceId'] == '1fdcf8ea-199c-11eb-aed1-50e549398ade'){
//            $quantity = $this->getDateDayDiff($dateTo, $dateFrom);
//        }
//        return $quantity;
//    }

    public function getTotalTransaction($order, $numDays, $numPets): float {
        $total = 0;
        foreach ($order as $item) {

            $order = (array) $item;

            $subtotal = 0;
            $quantity = 0;

            // Pet Hotel - Doggy School
            if($order['serviceId'] == '1fdcf8ea-199c-11eb-aed1-50e549398ade' || $order['serviceId'] == '7bcf5547-f268-463d-8760-e769d31fd345'){
                $subtotal = $subtotal + (($numDays * $order['price']) * $numPets);
                $quantity = $numDays;
            } else {
                $subtotal =  $subtotal + ($order['quantity'] * $order['price']);
                $quantity = $order['quantity'];
            }

            $order['quantity'] = $quantity;
            $order['subtotal'] = $subtotal;
            $total = $total + $order['subtotal'];
        }
        return $total;
    }

    public function getTotalTransactionService($order): float {
        $total = 0;
        foreach ($order as $item) {

            $order = (array) $item;

            $subtotal = 0;
            $quantity = 0;

            // Hospedaje
            $subtotal =  $subtotal + ($order['quantity'] * $order['price']);
            $quantity = $order['quantity'];

            $order['quantity'] = $quantity;
            $order['subtotal'] = $subtotal;
            $total = $total + $order['subtotal'];
        }
        return $total;
    }

    public function stateAudit() {
        return $this->transactionRepository->getAttrByUuidModel(new DataMasterModel(), '1cca03ea-07dc-11eb-ab06-50e549398ade', 'id_row');
    }
    public function getIdCustomer($userId) {
        return $this->transactionRepository->getAttrByUuidModelWithAttr(new CustomerModel(), 'user_id', $userId);
    }

}