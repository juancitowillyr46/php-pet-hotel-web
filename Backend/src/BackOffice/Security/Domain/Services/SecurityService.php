<?php


namespace App\BackOffice\Security\Domain\Services;

use App\BackOffice\Security\Domain\Entities\LoginDto;
use App\BackOffice\Security\Domain\Entities\LoginEntity;
use App\BackOffice\Security\Domain\Entities\LoginMapper;
use App\BackOffice\Security\Domain\Entities\TokenEntity;
use App\BackOffice\Security\Domain\Exceptions\PasswordIncorrectException;
use App\BackOffice\Security\Domain\Exceptions\UserBlockedException;
use App\BackOffice\Security\Domain\Exceptions\UserIsNotAdminException;
use App\BackOffice\Security\Domain\Exceptions\UserNotExistException;
use App\BackOffice\Security\Infrastructure\Persistence\SecurityRepository;
use App\Shared\Domain\Services\BaseService;
use App\Shared\Utility\JwtCustom;
use App\Shared\Utility\SecurityPassword;
use Exception;
use Psr\Log\LoggerInterface;

class SecurityService extends BaseService
{
    protected LoginEntity $loginEntity;
    protected SecurityRepository $securityRepository;
    protected LoginMapper $loginMapper;

    public function __construct(LoggerInterface $loggerInterface, SecurityRepository $securityRepository, LoginEntity $loginEntity, LoginMapper $loginMapper)
    {
        $this->loginEntity = $loginEntity;
        $this->loginMapper = $loginMapper;
        $this->securityRepository = $securityRepository;
        parent::__construct($loggerInterface, $securityRepository);
    }

    public function executeLoginManager(array $request, bool $isAdmin): object {

        $this->loginEntity->payload((object)$request);

        $success = $this->securityRepository->searchUserByUsername($request['username']);

        if(is_null($success)){
            throw new UserNotExistException();
        }

        $user = (array)$success;

        if($isAdmin == true && $user['role_id'] != 2){
            throw new UserIsNotAdminException();
        }

        $this->isBlockedUser($user);

        $verifyPassword = SecurityPassword::verifyPassword($request['password'], $user['password']);

        if(!$verifyPassword){
            throw new PasswordIncorrectException();
        }

        $loginDto = new LoginDto();
        $loginDto->setId($user['uuid']);
        $loginDto->setEmail($user['email']);
        $loginDto->setUsername($user['username']);

        $jwt = new JwtCustom();
        $token = $jwt->geToken($loginDto);

        $tokenEntity = new TokenEntity();
        $tokenEntity->setToken($token);

        return $tokenEntity;

    }

    public function isBlockedUser(array $user): bool{
        $user = $this->securityRepository->searchUserByUsername($user['username']);

        $blocked = ($user['blocked'] == '1' || $user['blocked'] == 1);

        if(is_bool($blocked) && $blocked){
            throw new UserBlockedException();
        }

        return $blocked;
    }

    public function executeRegisterWeb(array $request): bool {
        $this->loginEntity->payloadRegister((object)$request);
        return true;
    }
}