<?php
namespace App\BackOffice\Modules\Domain\Repository;

interface ModuleRepositoryInterface
{
    public function addUser(array $module): bool;

    public function editUser(int $id, array $module): bool;

    public function findUser(int $id): array;

    public function removeUser(int $id): bool;

    public function allUsers(array $query): object;

}