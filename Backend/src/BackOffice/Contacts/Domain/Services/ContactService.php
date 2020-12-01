<?php
namespace App\BackOffice\Contacts\Domain\Services;

use App\BackOffice\Customers\Domain\Entities\CustomerEntity;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Roles\Domain\Entities\RoleModel;
use App\BackOffice\Contacts\Domain\Entities\ContactDto;
use App\BackOffice\Contacts\Domain\Entities\ContactEntity;
use App\BackOffice\Contacts\Domain\Entities\ContactMapper;
use App\BackOffice\Contacts\Infrastructure\Persistence\ContactRepository;
use App\BackOffice\Users\Domain\Entities\UserModel;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class ContactService extends BaseService
{
    protected ContactEntity $contactEntity;
    protected ContactRepository $contactRepository;
    protected ContactMapper $contactMapper;

    public function __construct(LoggerInterface $loggerInterface, ContactRepository $contactRepository, ContactEntity $contactEntity, ContactMapper $contactMapper)
    {
        $this->contactEntity = $contactEntity;
        $this->contactRepository = $contactRepository;
        $this->contactMapper = $contactMapper;
        parent::__construct($loggerInterface, $contactRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->contactEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->contactEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->contactEntity->setUuid($uuid);
        return $this->contactEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getContactDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getContactDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): ContactEntity {
        $this->contactEntity->payload((object)$request);
        return $this->contactEntity;
    }

    public function getContactDto(array $row): object {
        return $this->contactMapper->autoMapper->map($row, ContactDto::class);
    }


}