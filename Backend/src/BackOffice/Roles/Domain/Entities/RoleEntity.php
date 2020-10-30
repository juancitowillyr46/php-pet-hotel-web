<?php
namespace App\BackOffice\Roles\Domain\Entities;

use App\BackOffice\Roles\Domain\Exceptions\RoleActionRequestSchema;
use App\Shared\Domain\Entities\Audit;
use Exception;

class RoleEntity extends Audit
{
    public string $name;
    public string $description;

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

    public function payload(object $formData): void {

        try {

            $validate = new RoleActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);
            $this->setName($formData->name);
            $this->setDescription($formData->description);
            $this->setActive($formData->active);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }
}