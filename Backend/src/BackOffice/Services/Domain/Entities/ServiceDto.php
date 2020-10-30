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

}