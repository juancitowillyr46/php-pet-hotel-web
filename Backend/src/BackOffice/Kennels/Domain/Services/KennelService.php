<?php
namespace App\BackOffice\Kennels\Domain\Services;

use App\BackOffice\Kennels\Domain\Entities\KennelDto;
use App\BackOffice\Kennels\Domain\Entities\KennelEntity;
use App\BackOffice\Kennels\Domain\Entities\KennelMapper;
use App\BackOffice\Kennels\Infrastructure\Persistence\KennelRepository;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class KennelService extends BaseService
{
    protected KennelEntity $kennelEntity;
    protected KennelRepository $kennelRepository;
    protected KennelMapper $kennelMapper;

    public function __construct(LoggerInterface $loggerInterface, KennelRepository $kennelRepository, KennelEntity $kennelEntity, KennelMapper $kennelMapper)
    {
        $this->kennelEntity = $kennelEntity;
        $this->kennelRepository = $kennelRepository;
        $this->kennelMapper = $kennelMapper;
        parent::__construct($loggerInterface, $kennelRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->kennelEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->kennelEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->kennelEntity->setUuid($uuid);
        return $this->kennelEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getKennelDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getKennelDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): KennelEntity {
        $this->kennelEntity->payload((object)$request);
        return $this->kennelEntity;
    }

    public function getKennelDto(array $row): object {
//        $kennelType = $this->getRowByIdModel(new ServiceTypeModel(), $row['service_type_id']);
//        $row['service_type_name'] = $kennelType['name'];
        return $this->kennelMapper->autoMapper->map($row, KennelDto::class);
    }


}