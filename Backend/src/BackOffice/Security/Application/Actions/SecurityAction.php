<?php
namespace App\BackOffice\Security\Application\Actions;

//use App\BackOffice\Security\Domain\Services\LoginService;
use App\BackOffice\Security\Domain\Services\SecurityService;
use App\BackOffice\Users\Domain\Services\UserService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class SecurityAction extends Action
{
    public SecurityService $securityService;
    public UserService $userService;
    public LoggerInterface $logger;

    public function __construct(
        LoggerInterface $logger,
        SecurityService $securityService,
        UserService $userService
    )
    {
        $this->userService = $userService;
        $this->securityService = $securityService;
        parent::__construct($logger);
    }

}

