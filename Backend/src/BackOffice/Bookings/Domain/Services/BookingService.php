<?php
namespace App\BackOffice\Bookings\Domain\Services;

use App\BackOffice\Bookings\Domain\Entities\BookingDto;
use App\BackOffice\Bookings\Domain\Entities\BookingEntity;
use App\BackOffice\Bookings\Domain\Entities\BookingMapper;
use App\BackOffice\Bookings\Infrastructure\Persistence\BookingRepository;
use App\BackOffice\Customers\Domain\Entities\CustomerModel;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Kennels\Domain\Entities\KennelModel;
use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class BookingService extends BaseService
{
    protected BookingEntity $bookingEntity;
    protected BookingRepository $bookingRepository;
    protected BookingMapper $bookingMapper;

    public function __construct(LoggerInterface $loggerInterface, BookingRepository $bookingRepository, BookingEntity $bookingEntity, BookingMapper $bookingMapper)
    {
        $this->bookingEntity = $bookingEntity;
        $this->bookingRepository = $bookingRepository;
        $this->bookingMapper = $bookingMapper;
        parent::__construct($loggerInterface, $bookingRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->bookingEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->bookingEntity->getResponseDataId();
    }

    public function executeEditState(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormDataState($request);
        $this->edit((array)$formData, $uuid);
        return $this->bookingEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->bookingEntity->setUuid($uuid);
        return $this->bookingEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getBookingDto($getRow);
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getBookingDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): BookingEntity {
        $this->bookingEntity->payload((object)$request);
        $kennelId = $this->getIdByUuidModel(new KennelModel(), $request['kennelId']);
        $stateBookingId = $this->getIdByUuidModel(new DataMasterModel(), $request['stateId']);
        $petId = $this->getIdByUuidModel(new PetModel(), $request['petId']);
        $customerId = $this->getIdByUuidModel(new CustomerModel(), $request['customerId']);
        $this->bookingEntity->setKennelId($kennelId);
        $this->bookingEntity->setStateId($stateBookingId);
        $this->bookingEntity->setPetId($petId);
        $this->bookingEntity->setCustomerId($customerId);
        return $this->bookingEntity;
    }

    public function setFormDataState(array $request): BookingEntity {
        $stateBookingId = $this->bookingRepository->getAttrByUuidModel(new DataMasterModel(), $request['stateId'], 'id_row');
        $this->bookingEntity->setStateId($stateBookingId);
        $this->bookingEntity->payloadState((object)$request);
        return $this->bookingEntity;
    }

    public function getBookingDto(array $row): object {
        $kennel = $this->getRowByIdModel(new KennelModel(), $row['kennel_id']);
        $row['kennel_id'] = $kennel['uuid'];
        $row['kennel_name'] = $kennel['name'];

        $pet = $this->getRowByIdModel(new PetModel(), $row['pet_id']);
        $row['pet_id'] = $pet['uuid'];
        $row['pet_name'] = $pet['name'];

        $customer = $this->getRowByIdModel(new CustomerModel(), $row['customer_id']);
        $row['customer_id'] = $customer['uuid'];
        $row['customer_name'] = $customer['first_name']." ".$customer['last_name'];

        $stateBookingId = $this->getRowByIdModelByTable(new DataMasterModel(), $row['state_id'], 'TABLE_STATE_BOOKING');
        $row['state_id'] = $stateBookingId['uuid'];
        $row['state_name'] = $stateBookingId['name'];

        if(is_null($row['cancellation_date'])){
            $row['cancellation_date'] = "";
        }

        if(is_null($row['cancellation_note'])){
            $row['cancellation_note'] = "";
        }

        return $this->bookingMapper->autoMapper->map($row, BookingDto::class);
    }

}