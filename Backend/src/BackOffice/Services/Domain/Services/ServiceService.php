<?php
namespace App\BackOffice\Services\Domain\Services;

use App\BackOffice\Customers\Domain\Entities\CustomerModel;
use App\BackOffice\Services\Domain\Entities\ServiceDto;
use App\BackOffice\Services\Domain\Entities\ServiceEntity;
use App\BackOffice\Services\Domain\Entities\ServiceMapper;
use App\BackOffice\Services\Domain\Entities\ServiceTypeModel;
use App\BackOffice\Services\Infrastructure\Persistence\ServiceRepository;
use App\BackOffice\Users\Domain\Entities\UserModel;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class ServiceService extends BaseService
{
    protected ServiceEntity $serviceEntity;
    protected ServiceRepository $serviceRepository;
    protected ServiceMapper $serviceMapper;

    public function __construct(LoggerInterface $loggerInterface, ServiceRepository $serviceRepository, ServiceEntity $serviceEntity, ServiceMapper $serviceMapper)
    {
        $this->serviceEntity = $serviceEntity;
        $this->serviceRepository = $serviceRepository;
        $this->serviceMapper = $serviceMapper;
        parent::__construct($loggerInterface, $serviceRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->serviceEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->serviceEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->serviceEntity->setUuid($uuid);
        return $this->serviceEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getServiceDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getServiceDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): ServiceEntity {
        $this->serviceEntity->payload((object)$request);
        $this->serviceEntity->setServiceTypeId($this->getIdByUuidModel(new ServiceTypeModel(), $request['serviceTypeId'])); // Role Id
        return $this->serviceEntity;
    }

    public function getServiceDto(array $row): object {
        $serviceType = $this->getRowByIdModel(new ServiceTypeModel(), $row['service_type_id']);
        $row['service_type_name'] = $serviceType['name'];
        $row['service_type_id'] = $serviceType['uuid'];
        return $this->serviceMapper->autoMapper->map($row, ServiceDto::class);
    }

    public function serviceCommon(): array {
        return $this->executeCommon(new ServiceTypeModel());
    }

}