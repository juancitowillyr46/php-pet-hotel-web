<?php
namespace App\BackOffice\Roles\Domain\Services;

use App\BackOffice\Roles\Domain\Entities\RoleModel;
use App\BackOffice\Roles\Domain\Entities\RoleDto;
use App\BackOffice\Roles\Domain\Entities\RoleEntity;
use App\BackOffice\Roles\Domain\Entities\RoleMapper;
use App\BackOffice\Roles\Infrastructure\Persistence\RoleRepository;
use App\Shared\Domain\Services\BaseService;
use App\Shared\Exception\Commands\DuplicateActionException;
use Exception;
use Psr\Log\LoggerInterface;
use stdClass;

class RoleService extends BaseService
{
      protected RoleEntity $roleEntity;
      protected RoleRepository $roleRepository;
      protected RoleMapper $roleMapper;

      public function __construct(LoggerInterface $loggerInterface, RoleRepository $roleRepository, RoleEntity $roleEntity, RoleMapper $roleMapper)
      {
          $this->roleEntity = $roleEntity;
          $this->roleRepository = $roleRepository;
          $this->roleMapper = $roleMapper;
          parent::__construct($loggerInterface, $roleRepository);
      }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->roleEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->roleEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->roleEntity->setUuid($uuid);
        return $this->roleEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getRoleDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getRoleDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): RoleEntity {
        $this->roleEntity->payload((object)$request);
        return $this->roleEntity;
    }

    public function getRoleDto(array $row): object {

        return $this->roleMapper->autoMapper->map($row, RoleDto::class);
    }

}