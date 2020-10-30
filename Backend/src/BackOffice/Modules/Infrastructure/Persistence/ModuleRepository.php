<?php
namespace App\BackOffice\Modules\Infrastructure\Persistence;

use App\BackOffice\Modules\Domain\Entities\ModuleModel;
use App\Shared\Exception\Database\ExceptionEloquent;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;
use Psr\Log\LoggerInterface;
use stdClass;

class ModuleRepository extends BaseRepository
{

    public function __construct()
    {
        $this->setModel(new ModuleModel());
    }

}