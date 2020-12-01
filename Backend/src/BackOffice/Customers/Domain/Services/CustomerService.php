<?php
namespace App\BackOffice\Customers\Domain\Services;

use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Roles\Domain\Entities\RoleModel;
use App\BackOffice\Customers\Domain\Entities\CustomerDto;
use App\BackOffice\Customers\Domain\Entities\CustomerEntity;
use App\BackOffice\Customers\Domain\Entities\CustomerMapper;
use App\BackOffice\Customers\Infrastructure\Persistence\CustomerRepository;
use App\BackOffice\Users\Domain\Entities\UserModel;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class CustomerService extends BaseService
{
    protected CustomerEntity $customerEntity;
    protected CustomerRepository $customerRepository;
    protected CustomerMapper $customerMapper;

    public function __construct(LoggerInterface $loggerInterface, CustomerRepository $customerRepository, CustomerEntity $customerEntity, CustomerMapper $customerMapper)
    {
        $this->customerEntity = $customerEntity;
        $this->customerRepository = $customerRepository;
        $this->customerMapper = $customerMapper;
        parent::__construct($loggerInterface, $customerRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->customerEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->customerEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->customerEntity->setUuid($uuid);
        return $this->customerEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getUserDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getUserDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): CustomerEntity {
        $this->customerEntity->payload((object)$request);
        $this->customerEntity->setUserId($this->getIdByUuidModel(new UserModel(), $request['userId'])); // Role Id
        if($request['districtId'] != ""){
            $districtId = $this->getAttrByUuidModel(new DataMasterModel(), $request['districtId'], 'id_row');
        } else {
            $districtId = "0";
        }
        $this->customerEntity->setDistrictId($districtId);
        return $this->customerEntity;
    }

    public function getUserDto(array $row): object {
        $user = $this->getRowByIdModel(new UserModel(), $row['user_id']);
        $row['user_name'] = $user['username'];

        if($row['district_id'] != null && $row['district_id'] != '0'){
            $districtId = $this->getRowByIdModelByTable(new DataMasterModel(), $row['district_id'], 'TABLE_DISTRICT');
            $row['district_name'] = $districtId['name'];
            $row['district_id'] = $districtId['uuid'];
        }  else {
            $row['district_name'] = "";
            $row['district_id'] = "";
        }

        return $this->customerMapper->autoMapper->map($row, CustomerDto::class);
    }


}