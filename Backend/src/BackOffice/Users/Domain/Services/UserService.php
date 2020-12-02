<?php
namespace App\BackOffice\Users\Domain\Services;

//use App\BackOffice\Roles\Domain\Entities\RoleModel;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Roles\Domain\Entities\RoleModel;
use App\BackOffice\Users\Domain\Entities\UserDto;
use App\BackOffice\Users\Domain\Entities\UserEntity;
use App\BackOffice\Users\Domain\Entities\UserInfoDto;
use App\BackOffice\Users\Domain\Entities\UserMapper;
//use App\BackOffice\Users\Domain\Entities\UserModel;
use App\BackOffice\Users\Infrastructure\Persistence\UserRepository;
use App\Shared\Domain\Services\BaseService;
//use App\Shared\Exception\Commands\AddActionException;
use App\Shared\Exception\Commands\DuplicateActionException;
//use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;
use Psr\Log\LoggerInterface;
use stdClass;

class UserService extends BaseService
{
      protected UserEntity $userEntity;
      protected UserRepository $userRepository;
      protected UserMapper $userMapper;

      public function __construct(LoggerInterface $loggerInterface, UserRepository $userRepository, UserEntity $userEntity, UserMapper $userMapper)
      {
          $this->userEntity = $userEntity;
          $this->userRepository = $userRepository;
          $this->userMapper = $userMapper;
          parent::__construct($loggerInterface, $userRepository);
      }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->userEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->userEntity->getResponseDataId();
    }

    public function executeEditPassword(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormDataPassword($request);
        $this->edit((array)$formData, $uuid);
        return $this->userEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->userEntity->setUuid($uuid);
        return $this->userEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getUserDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $rows = $this->getAllRows($query, true);
        $list = [];
        foreach ($rows->rows as $row) {
            if($row['role_id'] == 1){
                $list[] = $this->getUserDto($row);
            }

        }
        $rows->rows = $list;
        return $rows;
    }

    public function executeMe(string $uuid): object {
        $row = $this->read($uuid);
        $role = $this->getRowByIdModel(new RoleModel(), $row['role_id']);
        $row['role_name']    = $role['name'];
        $row['role_id']      = $role['uuid'];
        $row['role_modules'] = $role['modules'];
        $row['customer_id']  = (!is_null($row['customer']))? $row['customer']['uuid'] : '';
        $row['image'] = "";
        return $this->userMapper->autoMapper->map($row, UserInfoDto::class);
    }


    public function setFormData(array $request): UserEntity {
        $this->userEntity->setRoleId($this->getIdByUuidModel(new RoleModel(), $request['roleId'])); // Role Id

        $blockedId = $this->userRepository->getAttrByUuidModel(new DataMasterModel(), $request['blocked'], 'id_row');

        $this->userEntity->payload((object)$request);
        $this->userEntity->setBlocked($blockedId);

        $this->validateDuplicateRow();
        return $this->userEntity;
    }

    public function setFormDataPassword(array $request): UserEntity {
        $this->userEntity->payloadPassword((object)$request);
        return $this->userEntity;
    }

    public function validateDuplicateRow(): void {

        $uuid = $this->userEntity->getUuid();
        $email = $this->userEntity->getEmail();
        $username = $this->userEntity->getUsername();

        $existEmail = $this->userRepository->getExistRowByAttr('email', $email, $uuid);
        if($existEmail) {
            throw new DuplicateActionException();
        }

        $existUsername = $this->userRepository->getExistRowByAttr('username', $username, $uuid);
        if($existUsername) {
            throw new DuplicateActionException();
        }
    }

    public function validateByEmail($username) {
        return $this->userRepository->getModel()::all()->where('username', '=' ,$username)->first();
    }

    public function getUserDto(array $row): object {
        $role = $this->getRowByIdModel(new RoleModel(), $row['role_id']);
        $row['role_id'] = $role['uuid'];
        $row['role_name'] = $role['name'];

        $blocked = $this->getRowByIdModelByTable(new DataMasterModel(), $row['blocked'], 'TABLE_BLOCKED_USER');
        $row['blocked'] = $blocked['uuid'];
        $row['blocked_name'] = $blocked['name'];

        return $this->userMapper->autoMapper->map($row, UserDto::class);
    }

//    public function getMeInfo(): object {
//
//    }

}