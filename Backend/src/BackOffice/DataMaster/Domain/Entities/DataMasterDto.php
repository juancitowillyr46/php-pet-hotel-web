<?php
namespace App\BackOffice\DataMaster\Domain\Entities;

class DataMasterDto
{
    public string $id;
    public string $type;
    public string $name;
    public int $id_row;
    public string $description;
    public bool $active;
    public string $activeName;
    public string $createdAt;

}