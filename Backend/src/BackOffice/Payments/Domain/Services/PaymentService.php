<?php
namespace App\BackOffice\Payments\Domain\Services;

use App\BackOffice\Bookings\Domain\Entities\BookingModel;
use App\BackOffice\Customers\Domain\Entities\CustomerModel;
use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\BackOffice\Payments\Domain\Entities\PaymentDto;
use App\BackOffice\Payments\Domain\Entities\PaymentEntity;
use App\BackOffice\Payments\Domain\Entities\PaymentMapper;
use App\BackOffice\Payments\Infrastructure\Persistence\PaymentRepository;
use App\Shared\Domain\Services\BaseService;
use Psr\Log\LoggerInterface;

class PaymentService extends BaseService
{
    protected PaymentEntity $paymentEntity;
    protected PaymentRepository $paymentRepository;
    protected PaymentMapper $paymentMapper;

    public function __construct(LoggerInterface $loggerInterface, PaymentRepository $paymentRepository, PaymentEntity $paymentEntity, PaymentMapper $paymentMapper)
    {
        $this->paymentEntity = $paymentEntity;
        $this->paymentRepository = $paymentRepository;
        $this->paymentMapper = $paymentMapper;
        parent::__construct($loggerInterface, $paymentRepository);
    }

    public function executeAdd(array $request): object {
        $formData = $this->setFormData($request);
        $this->add((array)$formData);
        return $this->paymentEntity->getResponseDataId();
    }

    public function executeEdit(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormData($request);
        $this->edit((array)$formData, $uuid);
        return $this->paymentEntity->getResponseDataId();
    }

    public function executeEditState(array $request, string $uuid): object {
        $this->compareArgs($request['id'], $uuid);
        $formData = $this->setFormDataState($request);
        $this->edit((array)$formData, $uuid);
        return $this->paymentEntity->getResponseDataId();
    }

    public function executeRemove(string $uuid): object {
        $this->remove($uuid);
        $this->paymentEntity->setUuid($uuid);
        return $this->paymentEntity->getResponseDataId();
    }

    public function executeGet(string $uuid): object {
        $getRow = $this->read($uuid);
        return $this->getPaymentDto($getRow);
    }

    public function executeGetBookingIds(int $paymentId): array {
        $payment = $this->paymentRepository->getModel()::find($paymentId);
        $bookingId = [];
        foreach ($payment->bookings as $booking) {
            $bookingId[] = $booking->toArray();
        }
        return $bookingId;
    }


    public function executeGetByBookingId(string $bookingId) {

        //$payment = $this->paymentRepository->getModel()::find($paymentId);

//        $id = $this->paymentRepository->getIdByUuidModel(new BookingModel(), $bookingId);
//        $getRow = $this->paymentRepository->getModel()::all()->where('booking_id', '=', $id)->first();
//        return $this->getPaymentDto($getRow->toArray());
    }

    public function executeGetAll(array $query): object {
        $getRows = $this->getAllRows($query, true);
        $list = [];
        foreach ($getRows->rows as $getRow) {
            $list[] = $this->getPaymentDto($getRow);
        }
        $getRows->rows = $list;
        return $getRows;
    }

    public function setFormData(array $request): PaymentEntity {

        $bankId = $this->paymentRepository->getIdByUuidModel(new DataMasterModel(), $request['bankId']);
        $paymentMethodId = $this->getAttrByUuidModel(new DataMasterModel(), $request['paymentMethodId'], 'id_row');
        $stateId = $this->paymentRepository->getAttrByUuidModel(new DataMasterModel(), $request['stateId'], 'id_row');
        //$bookingId = $this->paymentRepository->getIdByUuidModel(new BookingModel(), $request['bookingId']);
        $customerId = $this->paymentRepository->getIdByUuidModel(new CustomerModel(), $request['customerId']);

        $this->paymentEntity->setBankId($bankId);
        $this->paymentEntity->setPaymentMethodId($paymentMethodId);
        $this->paymentEntity->setStateId($stateId);
        //$this->paymentEntity->setBookingId($bookingId);
        $this->paymentEntity->setCustomerId($customerId);
        $this->paymentEntity->payload((object)$request);

        return $this->paymentEntity;
    }

    public function setFormDataState(array $request): PaymentEntity {

        $stateId = $this->paymentRepository->getAttrByUuidModel(new DataMasterModel(), $request['stateId'], 'id_row');
        $this->paymentEntity->setStateId($stateId);

        if($request['bankId'] != '' && $request['bankId'] != '0') {
            $bankId = $this->paymentRepository->getAttrByUuidModel(new DataMasterModel(), $request['bankId'], 'id_row');
            $this->paymentEntity->setBankId($bankId);
        }

        $this->paymentEntity->payloadState((object)$request);
        return $this->paymentEntity;
    }

    public function getPaymentDto(array $row): object {

        $paymentMethod = $this->getRowByIdModelByTable(new DataMasterModel(), $row['payment_method_id'], 'TABLE_PAYMENT_METHOD');
        $row['payment_method_name'] = $paymentMethod['name'];
        $row['payment_method_id'] = $paymentMethod['uuid'];

        $state = $this->getRowByIdModelByTable(new DataMasterModel(), $row['state_id'], 'TABLE_PAYMENT_STATE');
        $row['state_name'] = $state['name'];
        $row['state_id'] = $state['uuid'];


        if($row['bank_id'] > 0){
            $bank = $this->getRowByIdModelByTable(new DataMasterModel(), $row['bank_id'], 'TABLE_BANKS');
            $row['bank_name'] = $bank['name'];
            $row['bank_id'] = $bank['uuid'];
        }

        return $this->paymentMapper->autoMapper->map($row, PaymentDto::class);
    }

    public function paymentStateDefault(string $paymentMethodId) {
        $paymentMethodIdRow = $this->paymentRepository->getAttrByUuidModel(new DataMasterModel(), $paymentMethodId, 'id_row');
        $idRow = (int) $paymentMethodIdRow;

        $stateId = "";
        // Tranferencia Bancaria
        if($idRow == 1) {
            $stateId = '1cca03ea-07dc-11eb-ab06-50e549398ade6';
            // Plin o Lukita
        } else if($idRow == 2) {
            $stateId = '1cca03ea-07dc-11eb-ab06-50e549398ade6';
            // Yape
        } else if($idRow == 3) {
            $stateId = '1cca03ea-07dc-11eb-ab06-50e549398ade6';
            // POS
        } else if($idRow == 4) {
            $stateId = '1cca03ea-07dc-11eb-ab06-50e549398ade6';
        }
        return $stateId;
    }

}