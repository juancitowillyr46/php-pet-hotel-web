<?php
namespace App\BackOffice\Kennels\Domain\Entities;

class KennelDto
{
    public string $id;
    public string $name;
    public string $num;
    public string $description;
    public bool $isBooked;
    public string $isBookedName;
    public bool $active;
    public string $activeName;
    public string $createdAt;

}