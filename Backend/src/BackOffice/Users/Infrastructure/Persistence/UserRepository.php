<?php
namespace App\BackOffice\Users\Infrastructure\Persistence;

use App\BackOffice\Users\Domain\Entities\UserModel;
use App\BackOffice\Users\Domain\Repository\UserRepositoryInterface;
use App\Shared\Exception\Database\ExceptionEloquent;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;
use Psr\Log\LoggerInterface;
use stdClass;

class UserRepository extends BaseRepository
{

    public function __construct()
        // LoggerInterface $loggerInterface
    {
        $this->setModel(new UserModel());
//        parent::__construct($loggerInterface);
    }

}