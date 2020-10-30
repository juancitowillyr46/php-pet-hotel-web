<?php
namespace App\Shared\Domain\Services;

use App\Shared\Domain\Uuid;

interface ServiceInterface
{
    public function add(array $request): bool;
    public function edit(array $request, string $uuid): bool;
    public function remove(string $uuid): bool;
    public function read(string $uuid): array;
    public function getAllRows(?array $query, bool $usingPaginate): object;
}