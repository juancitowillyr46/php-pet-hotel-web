<?php
namespace App\BackOffice\Payments\Domain\Services;

use App\BackOffice\Customers\Domain\Entities\CustomerModel;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Payments\Domain\Entities\PaymentDto;
use App\BackOffice\Payments\Domain\Entities\PaymentEntity;
use App\BackOffice\Payments\Domain\Entities\PaymentMapper;
use App\BackOffice\Payments\Infrastructure\Persistence\PaymentRepository;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class PaymentService extends BaseService
{
    protected PaymentEntity $paymentEntity;
    protected PaymentRepository $paymentRepository;
    protected PaymentMapper $paymentMapper;

    public function __construct(LoggerInterface $loggerInterface, PaymentRepository $paymentRepository, PaymentEntity $paymentEntity, PaymentMapper $paymentMapper)
    {
        $this->paymentEntity = $paymentEntity;
        $this->paymentRepository = $paymentRepository;
        $this->paymentMapper = $paymentMapper;
        parent::__construct($loggerInterface, $paymentRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->paymentEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->paymentEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->paymentEntity->setUuid($uuid);
        return $this->paymentEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getPaymentDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getPaymentDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): PaymentEntity {

        $bankId = $this->paymentRepository->getIdByUuidModel(new DataMasterModel(), $request['bankId']);
        $paymentMethodId = $this->paymentRepository->getIdByUuidModel(new DataMasterModel(), $request['paymentMethodId']);
        $stateId = $this->paymentRepository->getIdByUuidModel(new DataMasterModel(), $request['stateId']);
        $bookingId = 2; //$this->paymentRepository->getIdByUuidModel(new DataMasterModel(), $request['bookingId'])
        $customerId = $this->paymentRepository->getIdByUuidModel(new CustomerModel(), $request['customerId']);

        $this->paymentEntity->setBankId($bankId);
        $this->paymentEntity->setPaymentMethodId($paymentMethodId);
        $this->paymentEntity->setStateId($stateId);
        $this->paymentEntity->setBookingId($bookingId);
        $this->paymentEntity->setCustomerId($customerId);
        $this->paymentEntity->payload((object)$request);

        return $this->paymentEntity;
    }

    public function getPaymentDto(array $row): object {
        $paymentMethod = $this->getRowByIdModel(new DataMasterModel(), $row['payment_method_id']);

        $state = $this->getRowByIdModel(new DataMasterModel(), $row['state_id']);
        $row['payment_method_name'] = $paymentMethod['name'];
        $row['state_name'] = $state['name'];

        $bank = $this->getRowByIdModel(new DataMasterModel(), $row['bank_id']);
        if($row['bank_id'] > 0){
            $row['bank_name'] = $bank['name'];
        }

        return $this->paymentMapper->autoMapper->map($row, PaymentDto::class);
    }


}