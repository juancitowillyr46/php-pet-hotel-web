<?php
namespace App\BackOffice\Kennels\Infrastructure\Persistence;

use App\BackOffice\Kennels\Domain\Entities\KennelModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class KennelRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new KennelModel());
    }
}