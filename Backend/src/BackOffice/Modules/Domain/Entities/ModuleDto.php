<?php
namespace App\BackOffice\Modules\Domain\Entities;

class ModuleDto
{
    public string $id;
    public string $name;
    public string $slug;
    public string $icon;
    public string $parentId;
    public bool $isParent;
    public bool $isChildren;
    public int $order;
    public bool $active;
    public string $activeName;
    public string $createdAt;
}