<?php
namespace App\BackOffice\Payments\Domain\Services;

use App\BackOffice\Payments\Domain\Entities\PaymentModel;
use App\BackOffice\Payments\Domain\Entities\PaymentOrderDto;
use App\BackOffice\Payments\Domain\Entities\PaymentOrderEntity;
use App\BackOffice\Payments\Domain\Entities\PaymentOrderMapper;
use App\BackOffice\Payments\Domain\Entities\PaymentOrderModel;
use App\BackOffice\Payments\Infrastructure\Persistence\PaymentOrderRepository;
use App\BackOffice\Services\Domain\Entities\ServiceModel;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class PaymentOrderService extends BaseService
{
    protected PaymentOrderEntity $paymentOrderEntity;
    protected PaymentOrderRepository $paymentOrderRepository;
    protected PaymentOrderMapper $paymentOrderMapper;

    public function __construct(LoggerInterface $loggerInterface, PaymentOrderRepository $paymentOrderRepository, PaymentOrderEntity $paymentOrderEntity, PaymentOrderMapper $paymentOrderMapper)
    {
        $this->paymentOrderEntity = $paymentOrderEntity;
        $this->paymentOrderRepository = $paymentOrderRepository;
        $this->paymentOrderMapper = $paymentOrderMapper;
        parent::__construct($loggerInterface, $paymentOrderRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->paymentOrderEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->paymentOrderEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->paymentOrderEntity->setUuid($uuid);
        return $this->paymentOrderEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getPaymentOrderDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getPaymentOrderDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function executeGetAllDetail(array $query): array {
        $paymentId = $this->paymentOrderRepository->getIdByUuidModel(new PaymentModel(), $query['paymentId']);
        $getRows = $this->paymentOrderRepository->getModel()::all()->where('payment_id', '=', $paymentId)->toArray();
        $list = [];
        foreach ($getRows as $getRow) {
            $list[] = $this->getPaymentOrderDto($getRow);
        }
        $getRows = $list;
        return $getRows;
    }

    public function setFormData(array $request): PaymentOrderEntity {
        $paymentId = $this->paymentOrderRepository->getIdByUuidModel(new PaymentModel(), $request['paymentId']);
        $serviceId = $this->paymentOrderRepository->getIdByUuidModel(new ServiceModel(), $request['serviceId']);
        $this->paymentOrderEntity->setPaymentId($paymentId);
        $this->paymentOrderEntity->setServiceId($serviceId);
        $this->paymentOrderEntity->setQuantity($request['quantity']);
        $this->paymentOrderEntity->setPrice($request['price']);
        $this->paymentOrderEntity->setSubtotal($request['subtotal']);
        $this->paymentOrderEntity->payload((object)$request);
        return $this->paymentOrderEntity;
    }

    public function getPaymentOrderDto(array $row): object {
        $service = $this->getRowByIdModel(new ServiceModel(), $row['service_id']);
        $row['service_id'] = $service['uuid'];
        $row['service_name'] = $service['name'];
        return $this->paymentOrderMapper->autoMapper->map($row, PaymentOrderDto::class);
    }


}