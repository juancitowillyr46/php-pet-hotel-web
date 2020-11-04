<?php
namespace App\BackOffice\Pets\Domain\Services;

use App\BackOffice\Customers\Domain\Entities\CustomerModel;
use App\BackOffice\Pets\Domain\Entities\PetDto;
use App\BackOffice\Pets\Domain\Entities\PetEntity;
use App\BackOffice\Pets\Domain\Entities\PetMapper;
use App\BackOffice\Pets\Infrastructure\Persistence\PetRepository;
use App\BackOffice\Users\Domain\Entities\UserModel;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class PetService extends BaseService
{
    protected PetEntity $petEntity;
    protected PetRepository $petRepository;
    protected PetMapper $petMapper;

    public function __construct(LoggerInterface $loggerInterface, PetRepository $petRepository, PetEntity $petEntity, PetMapper $petMapper)
    {
        $this->petEntity = $petEntity;
        $this->petRepository = $petRepository;
        $this->petMapper = $petMapper;
        parent::__construct($loggerInterface, $petRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->petEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->petEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->petEntity->setUuid($uuid);
        return $this->petEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getPetDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getPetDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function executeGetAllByIdCustomer(array $query): array {

        $customerId = $this->petRepository->getIdByUuidModel(new CustomerModel(), $query['customerId']);
        $getRows = $this->petRepository->getModel()::all()->where('customer_id', '=', $customerId)->toArray();
        $list = [];
        foreach ($getRows as $getRow) {
            $list[] = $this->getPetDto($getRow);
        }
        $getRows = $list;
        return $getRows;

//        $getRows = $this->getAllRows($query, false);
//        $list = [];
//        foreach ($getRows->rows as $getRow) {
//            $list[] = $this->getPetDto($getRow);
//        }
//        $getRows->rows = $list;
//        return $getRows;
    }

    public function setFormData(array $request): PetEntity {
        $this->petEntity->payload((object)$request);
        $this->petEntity->setCustomerId($this->getIdByUuidModel(new CustomerModel(), $request['customerId'])); // Role Id
        return $this->petEntity;
    }

    public function getPetDto(array $row): object {
        $customer = $this->getRowByIdModel(new CustomerModel(), $row['customer_id']);
        $row['customer_name'] = $customer['first_name']." ".$customer['last_name'];
        return $this->petMapper->autoMapper->map($row, PetDto::class);
    }


}