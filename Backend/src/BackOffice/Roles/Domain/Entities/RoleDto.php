<?php
namespace App\BackOffice\Roles\Domain\Entities;

class RoleDto
{
    public string $id;
    public string $name;
    public string $description;
    public bool $active;
    public string $activeName;
    public string $createdAt;
}