<?php
namespace App\BackOffice\Roles\Infrastructure\Persistence;

use App\BackOffice\Roles\Domain\Entities\RoleModel;
use App\Shared\Exception\Database\ExceptionEloquent;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;
use Psr\Log\LoggerInterface;
use stdClass;

class RoleRepository extends BaseRepository
{

    public function __construct()
    {
        $this->setModel(new RoleModel());
    }

}