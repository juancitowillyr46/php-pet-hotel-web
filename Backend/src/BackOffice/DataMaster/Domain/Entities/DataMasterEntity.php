<?php
namespace App\BackOffice\DataMaster\Domain\Entities;

use App\BackOffice\DataMaster\Domain\Exceptions\DataMasterActionRequestSchema;
use App\Shared\Domain\Entities\Audit;
use App\Shared\Utility\SecurityPassword;
use Exception;
use Ramsey\Uuid\Uuid;

class DataMasterEntity extends Audit
{
    public int $id_row;
    public string $name;
    public string $type;
    public string $description;

    /**
     * @return int
     */
    public function getIdRow(): int
    {
        return $this->id_row;
    }

    /**
     * @param int $id_row
     */
    public function setIdRow(int $id_row): void
    {
        $this->id_row = $id_row;
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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

            $validate = new DataMasterActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);
            $this->setType($formData->type);
            $this->setName($formData->name);
            $this->setDescription($formData->description);
            $this->setActive($formData->active);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }
}