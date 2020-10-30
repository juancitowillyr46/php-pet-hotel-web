<?php
namespace App\BackOffice\Kennels\Domain\Entities;

use App\BackOffice\Kennels\Domain\Exceptions\KennelActionRequestSchema;
use App\Shared\Domain\Entities\Audit;
use App\Shared\Utility\SecurityPassword;
use Exception;
use Ramsey\Uuid\Uuid;

class KennelEntity extends Audit
{
    public string $name;
    public string $num;
    public string $description;
    public bool $is_booked;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNum(): string
    {
        return $this->num;
    }

    /**
     * @param string $num
     */
    public function setNum(string $num): void
    {
        $this->num = $num;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function isIsBooked(): bool
    {
        return $this->is_booked;
    }

    /**
     * @param bool $is_booked
     */
    public function setIsBooked(bool $is_booked): void
    {
        $this->is_booked = $is_booked;
    }

    public function payload(object $formData): void {

        try {

            $validate = new KennelActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);
            $this->setName($formData->name);
            $this->setDescription($formData->description);
            $this->setNum($formData->num);
            $this->setIsBooked($formData->isBooked);
            $this->setActive($formData->active);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }
}