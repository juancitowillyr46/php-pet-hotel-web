<?php
namespace App\BackOffice\Modules\Domain\Services;

use App\BackOffice\Modules\Domain\Entities\ModuleModel;
use App\BackOffice\Modules\Domain\Entities\ModuleDto;
use App\BackOffice\Modules\Domain\Entities\ModuleEntity;
use App\BackOffice\Modules\Domain\Entities\ModuleMapper;
use App\BackOffice\Modules\Infrastructure\Persistence\ModuleRepository;
use App\Shared\Domain\Services\BaseService;
use App\Shared\Exception\Commands\DuplicateActionException;
use Exception;
use Psr\Log\LoggerInterface;
use stdClass;

class ModuleService extends BaseService
{
      protected ModuleEntity $moduleEntity;
      protected ModuleRepository $moduleRepository;
      protected ModuleMapper $moduleMapper;

      public function __construct(LoggerInterface $loggerInterface, ModuleRepository $moduleRepository, ModuleEntity $moduleEntity, ModuleMapper $moduleMapper)
      {
          $this->moduleEntity = $moduleEntity;
          $this->moduleRepository = $moduleRepository;
          $this->moduleMapper = $moduleMapper;
          parent::__construct($loggerInterface, $moduleRepository);
      }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->moduleEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->moduleEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->moduleEntity->setUuid($uuid);
        return $this->moduleEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getModuleDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getModuleDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): ModuleEntity {
        $this->moduleEntity->payload((object)$request);
        return $this->moduleEntity;
    }

    public function getModuleDto(array $row): object {
        return $this->moduleMapper->autoMapper->map($row, ModuleDto::class);
    }

}