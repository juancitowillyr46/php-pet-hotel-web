<?php
namespace App\BackOffice\Contacts\Domain\Entities;

class ContactDto
{
    public string $id;
    public string $name;
    public string $email;
    public string $message;
    public bool $active;
    public string $activeName;
    public string $createdAt;
}