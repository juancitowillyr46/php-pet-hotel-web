<?php
namespace App\BackOffice\Services\Domain\Entities;

use App\BackOffice\Services\Domain\Exceptions\ServiceActionRequestSchema;
use App\Shared\Domain\Entities\Audit;
use App\Shared\Utility\SecurityPassword;
use Exception;
use Ramsey\Uuid\Uuid;

class ServiceEntity extends Audit
{
    public string $name;
    public string $description;
    public bool $main;
    public string $image;
    public string $service_type_id;
    public float $price;

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
    public function isMain(): bool
    {
        return $this->main;
    }

    /**
     * @param bool $main
     */
    public function setMain(bool $main): void
    {
        $this->main = $main;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getServiceTypeId(): string
    {
        return $this->service_type_id;
    }

    /**
     * @param string $service_type_id
     */
    public function setServiceTypeId(string $service_type_id): void
    {
        $this->service_type_id = $service_type_id;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function payload(object $formData): void {

        try {

            $validate = new ServiceActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);
            $this->setName($formData->name);
            $this->setDescription($formData->description);
            $this->setMain($formData->main);
            $this->setImage($formData->image);
            $this->setPrice($formData->price);
            $this->setActive($formData->active);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }
}