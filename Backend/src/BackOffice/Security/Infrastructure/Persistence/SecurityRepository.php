<?php
namespace App\BackOffice\Security\Infrastructure\Persistence;

use App\BackOffice\Security\Domain\Entities\LoginModel;
use App\BackOffice\Security\Domain\Repository\SecurityRepositoryInterface;
use App\Shared\Exception\Commands\FindActionException;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class SecurityRepository extends BaseRepository implements SecurityRepositoryInterface
{

    public LoginModel $loginModel;

    public function __construct(LoginModel $loginModel)
    {
        $this->loginModel = $loginModel;

        // TODO: Para el Base Repository
        $this->setModel($loginModel);
    }

    public function searchUserByUsername(string $username): array
    {
        return $this->loginModel::all()->where('email', '=', $username)->first()->toArray();
    }
}