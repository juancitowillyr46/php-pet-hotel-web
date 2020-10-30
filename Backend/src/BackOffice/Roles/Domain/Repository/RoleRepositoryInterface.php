<?php
namespace App\BackOffice\Roles\Domain\Repository;

interface RoleRepositoryInterface
{
    public function addUser(array $role): bool;

    public function editUser(int $id, array $role): bool;

    public function findUser(int $id): array;

    public function removeUser(int $id): bool;

    public function allUsers(array $query): object;

}