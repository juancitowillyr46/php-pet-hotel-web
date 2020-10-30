<?php
namespace App\BackOffice\Pets\Infrastructure\Persistence;

use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class PetRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new PetModel());
    }
}