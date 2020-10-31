<?php
namespace App\BackOffice\Modules\Domain\Services;

use App\BackOffice\Modules\Domain\Entities\ModuleModel;
use App\BackOffice\Modules\Domain\Entities\ModuleDto;
use App\BackOffice\Modules\Domain\Entities\ModuleEntity;
use App\BackOffice\Modules\Domain\Entities\ModuleMapper;
use App\BackOffice\Modules\Domain\Entities\ModuleUserMenuDto;
use App\BackOffice\Modules\Infrastructure\Persistence\ModuleRepository;
use App\BackOffice\Roles\Domain\Entities\RoleModel;
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

    public function executeModuleMenu(array $modules): array {

//        $roleId = $this->moduleRepository->getIdByUuidModel(new RoleModel(), $uuid);
//        $modules = $this->moduleRepository->getModel()::all()->where('role_id', '=', $roleId)->toArray();
        //$getRow = $this->read($uuid);
        //$modules = $getRow['modules'];

        $menu = [];
        if(count($modules) > 0){

            $modulesParents = array_filter($modules, function($obj){
                if(isset($obj['is_parent'])){
                    $isParent = (bool) $obj['is_parent'];
                    if($isParent === false){
                        return false;
                    }
                }
                return true;
            });

            $modulesChildren = array_filter($modules, function($obj) {
                if(isset($obj['is_children'])){
                    $isChildren = $obj['is_children'];
                    if($isChildren === 0){
                        return false;
                    }
                }
                return true;
            });


            if(count($modulesParents) > 0){
                foreach($modulesParents as $parent) {
                    $subMenu = [];
                    if(count($modulesChildren) > 0){
                        foreach ($modulesChildren as $permission) {
                            if($parent['id'] === $permission['parent_id']){
                                $subMenu[] = $this->getModuleMenuDto($permission, []);
                            }
                        }
                    }
                    $menu[] = $this->getModuleMenuDto($parent, $subMenu);
                }
            }
        }
        return $menu;
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

    public function getModuleMenuDto(array $row, array $submenu = []): object {
        $userMenuDto = new ModuleUserMenuDto();
        $userMenuDto->setId($row['uuid']);
        $userMenuDto->setSlug(($row['slug'] != "")? $row['slug']: '' );
        $userMenuDto->setIcon(($row['icon'] != "")? $row['icon']: '' );
        $userMenuDto->setIsParent(($row['is_parent'] != "")? $row['is_parent']: '' );
        $userMenuDto->setIsChildren(($row['is_children'] != "")? $row['is_children']: '' );
        $userMenuDto->setOrder(($row['order'] != -1)? $row['order']: 0 );
        $userMenuDto->setName($row['name']);
        if(count($submenu) > 0){
            $userMenuDto->setSubmenu($submenu);
        }
//        return $this->moduleMapper->autoMapper->map($row, ModuleUserMenuDto::class);
        return $userMenuDto;
    }

}