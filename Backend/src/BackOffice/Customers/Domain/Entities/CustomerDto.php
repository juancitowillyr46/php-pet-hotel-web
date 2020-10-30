<?php
namespace App\BackOffice\Customers\Domain\Entities;

class CustomerDto
{
    public string $id;
    public string $firstName;
    public string $lastName;
    public bool $active;
    public string $activeName;
    public string $createdAt;
    public string $username;
}