<?php
namespace App\BackOffice\Customers\Domain\Entities;

class CustomerDto
{
    public string $id;
    public string $firstName;
    public string $lastName;
    public string $phone;
    public string $address;
    public string $addressReference;
    public string $addressOptional;
    public string $comments;
    public string $image;
    public bool $active;
    public string $activeName;
    public string $createdAt;
    public string $username;
    public string $email;
    public string $districtId;
    public string $districtName;
}