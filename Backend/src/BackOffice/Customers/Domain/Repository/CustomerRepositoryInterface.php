<?php
namespace App\BackOffice\Customers\Domain\Repository;

interface CustomerRepositoryInterface
{
    public function addUser(array $user): bool;

    public function editUser(int $id, array $user): bool;

    public function findUser(int $id): array;

    public function removeUser(int $id): bool;

    public function allUsers(array $query): object;

}