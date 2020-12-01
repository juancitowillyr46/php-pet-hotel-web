<?php
namespace App\BackOffice\Services\Domain\Entities;

class ServiceDto
{
    public string $id;
    public string $name;
    public string $description;
    public string $image;
    public bool $main;
    public string $serviceTypeName;
    public bool $active;
    public string $activeName;
    public string $createdAt;
    public float $price;
    public string $serviceTypeId;
    public string $planId;
    public string $planName;
    public string $visibleId;
    public string $visibleName;
    public int $order;
    public string $selectPetsId;
    public string $selectPetsName;
    public string $specialId;
    public string $specialName;
    public int $numDays;
}