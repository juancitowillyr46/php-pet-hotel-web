<?php
namespace App\BackOffice\Services\Domain\Services;

use App\BackOffice\Customers\Domain\Entities\CustomerModel;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Services\Domain\Entities\ServiceDto;
use App\BackOffice\Services\Domain\Entities\ServiceEntity;
use App\BackOffice\Services\Domain\Entities\ServiceMapper;
use App\BackOffice\Services\Domain\Entities\ServiceTypeModel;
use App\BackOffice\Services\Infrastructure\Persistence\ServiceRepository;
use App\BackOffice\Users\Domain\Entities\UserModel;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;
use Respect\Validation\Rules\BoolVal;

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
        $getRows = $this->getAllRows($query, BoolVal($query['usingPaginate']));
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

        $planServiceId = $this->serviceRepository->getAttrByUuidModel(new DataMasterModel(), $request['planId'], 'id_row');
        $this->serviceEntity->setPlanId($planServiceId);

        $visibleServiceId = $this->serviceRepository->getAttrByUuidModel(new DataMasterModel(), $request['visibleId'], 'id_row');
        $this->serviceEntity->setVisibleId($visibleServiceId);

        return $this->serviceEntity;
    }

    public function getServiceDto(array $row): object {

        // Tipo de Servicio
        $serviceType = $this->getRowByIdModel(new ServiceTypeModel(), $row['service_type_id']);
        $planService = $this->getRowByIdModelByTable(new DataMasterModel(), $row['plan_id'], 'TABLE_PLAN_SERVICE');
        $visibleService = $this->getRowByIdModelByTable(new DataMasterModel(), $row['visible_id'], 'TABLE_STATE_VISIBLE');
        $selectPets = $this->getRowByIdModelByTable(new DataMasterModel(), $row['select_pets'], 'TABLE_SERVICE_NUM_PETS');

        $row['plan_id'] = $planService['uuid'];
        $row['plan_name'] = $planService['name'];

        $row['visible_id'] = $visibleService['uuid'];
        $row['visible_name'] = $visibleService['name'];

        $row['service_type_name'] = $serviceType['name'];
        $row['service_type_id'] = $serviceType['uuid'];

        $row['select_pets_id'] = $selectPets['uuid'];
        $row['select_pets_name'] = $selectPets['name'];

        $row['special_id'] = "";
        $row['special_name'] = "";

        if($row['is_special'] != 0) {
            $specialService = $this->getRowByIdModelByTable(new DataMasterModel(), $row['is_special'], 'TABLE_SERVICE_SPECIAL');
            $row['special_id'] = $specialService['uuid'];
            $row['special_name'] = $specialService['name'];
        }


        return $this->serviceMapper->autoMapper->map($row, ServiceDto::class);
    }

    public function serviceCommon(): array {
        return $this->executeCommon(new ServiceTypeModel());
    }

}