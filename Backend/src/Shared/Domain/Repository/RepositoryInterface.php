<?php
namespace App\Shared\Domain\Repository;

//interface RepositoryInterface
//{
//    public function add(array $request): bool;
//    public function edit(array $request, int $id): bool;
//    public function remove(int $id): bool;
//    public function find(int $id): array;
//    public function all(?array $query): array;
//    public function allById(string $key, string $value): array;
//    public function findByUuid(string $uuid): ?int;
//}

interface RepositoryInterface
{
    public function add(array $request): bool;
    public function edit(array $request, int $id): bool;
    public function remove(array $request, int $id): bool;
    public function read(int $id): array;
    public function getAllRows(?array $query, bool $usingPaginate): object;
}