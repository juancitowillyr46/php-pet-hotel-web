<?php
namespace App\BackOffice\DataMaster\Domain\Services;

use App\BackOffice\DataMaster\Domain\Entities\DataMasterDto;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterEntity;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterMapper;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\DataMaster\Infrastructure\Persistence\DataMasterRepository;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class DataMasterService extends BaseService
{
    protected DataMasterEntity $dataMasterEntity;
    protected DataMasterRepository $dataMasterRepository;
    protected DataMasterMapper $dataMasterMapper;

    public function __construct(LoggerInterface $loggerInterface, DataMasterRepository $dataMasterRepository, DataMasterEntity $dataMasterEntity, DataMasterMapper $dataMasterMapper)
    {
        $this->dataMasterEntity = $dataMasterEntity;
        $this->dataMasterRepository = $dataMasterRepository;
        $this->dataMasterMapper = $dataMasterMapper;
        parent::__construct($loggerInterface, $dataMasterRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->dataMasterEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->dataMasterEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->dataMasterEntity->setUuid($uuid);
        return $this->dataMasterEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getDataMasterDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getDataMasterDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): DataMasterEntity {

        if(!$request['id']){
            $idRow = $this->dataMasterRepository->generateIdRow($request['type']);
        } else {
            $idRow = $this->dataMasterRepository->getAttrByUuidModel(new DataMasterModel(), $request['id'], 'id_row');
        }

        $this->dataMasterEntity->setIdRow($idRow);
        $this->dataMasterEntity->payload((object)$request);
        return $this->dataMasterEntity;
    }

    public function getDataMasterDto(array $row): object {
        return $this->dataMasterMapper->autoMapper->map($row, DataMasterDto::class);
    }



}