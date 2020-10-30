<?php
namespace App\BackOffice\Services\Infrastructure\Persistence;

use App\BackOffice\Services\Domain\Entities\ServiceModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class ServiceRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new ServiceModel());
    }
}