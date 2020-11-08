<?php
namespace App\BackOffice\Bookings\Domain\Entities;

use App\BackOffice\Bookings\Domain\Exceptions\BookingActionRequestSchema;
use App\BackOffice\Bookings\Domain\Exceptions\BookingEditStateSchema;
use App\Shared\Domain\Entities\Audit;
use App\Shared\Utility\SecurityPassword;
use Exception;
use Ramsey\Uuid\Uuid;

class BookingEntity extends Audit
{
    public int $kennel_id;
    public int $state_id;
    public int $pet_id;
    public int $customer_id;
    public string $date_to;
    public string $date_from;
    public string $cancellation_date;
    public string $cancellation_note;

    /**
     * @return int
     */
    public function getKennelId(): int
    {
        return $this->kennel_id;
    }

    /**
     * @param int $kennel_id
     */
    public function setKennelId(int $kennel_id): void
    {
        $this->kennel_id = $kennel_id;
    }

    /**
     * @return int
     */
    public function getStateId(): int
    {
        return $this->state_id;
    }

    /**
     * @param int $state_id
     */
    public function setStateId(int $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @return int
     */
    public function getPetId(): int
    {
        return $this->pet_id;
    }

    /**
     * @param int $pet_id
     */
    public function setPetId(int $pet_id): void
    {
        $this->pet_id = $pet_id;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customer_id;
    }

    /**
     * @param int $customer_id
     */
    public function setCustomerId(int $customer_id): void
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return string
     */
    public function getDateTo(): string
    {
        return $this->date_to;
    }

    /**
     * @param string $date_to
     */
    public function setDateTo(string $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @return string
     */
    public function getDateFrom(): string
    {
        return $this->date_from;
    }

    /**
     * @param string $date_from
     */
    public function setDateFrom(string $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @return string
     */
    public function getCancellationDate(): string
    {
        return $this->cancellation_date;
    }

    /**
     * @param string $cancellation_date
     */
    public function setCancellationDate(string $cancellation_date): void
    {
        $this->cancellation_date = $cancellation_date;
    }

    /**
     * @return string
     */
    public function getCancellationNote(): string
    {
        return $this->cancellation_note;
    }

    /**
     * @param string $cancellation_note
     */
    public function setCancellationNote(string $cancellation_note): void
    {
        $this->cancellation_note = $cancellation_note;
    }

    public function payload(object $formData): void {

        try {

            $validate = new BookingActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);

            $this->setDateTo($formData->dateTo);
            $this->setDateFrom($formData->dateFrom);

            if($formData->cancellationDate != ""){
                $this->setCancellationDate($formData->cancellationDate);
            }

            if($formData->cancellationDate != ""){
                $this->setCancellationNote($formData->cancellationNote);
            }

            $this->setActive($formData->active);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }

    public function payloadState(object $formData) {
        try {

            $validate = new BookingEditStateSchema();
            $this->identifiedResource($formData);
            $validate->getMessages((array)$formData);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }
    }
}