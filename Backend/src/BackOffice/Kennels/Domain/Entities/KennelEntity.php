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
    public int $is_booked;

    /**
     * @return int
     */
    public function getIsBooked(): int
    {
        return $this->is_booked;
    }

    /**
     * @param int $is_booked
     */
    public function setIsBooked(int $is_booked): void
    {
        $this->is_booked = $is_booked;
    }


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


    public function payload(object $formData): void {

        try {

            $validate = new KennelActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);
            $this->setName($formData->name);
            $this->setDescription($formData->description);
            $this->setNum($formData->num);

            $this->setActive($formData->active);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }
}