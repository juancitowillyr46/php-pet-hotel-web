<?php
namespace App\BackOffice\Users\Application\Actions;

//use App\BackOffice\Users\Domain\Services\UserAddService;
//use App\BackOffice\Users\Domain\Services\UserEditService;
//use App\BackOffice\Users\Domain\Services\UserFindAllService;
//use App\BackOffice\Users\Domain\Services\UserFindService;
//use App\BackOffice\Users\Domain\Services\UserRemoveService;
use App\BackOffice\Modules\Domain\Services\ModuleService;
use App\BackOffice\Users\Domain\Services\UserService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class UsersAction extends Action
{
    public UserService $userService;
    public ModuleService $moduleService;

    public function __construct(
        LoggerInterface $logger,
        UserService $userService,
        ModuleService $moduleService
    )
    {
        $this->moduleService = $moduleService;
        $this->userService = $userService;
        parent::__construct($logger);
    }

////    public UserAddService $userAddService;
////    public UserEditService $userEditService;
////    public UserFindService $userFindService;
////    public UserFindAllService $userFindAllService;
////    public UserRemoveService $userRemoveService;
//
//    public LoggerInterface $logger;
//
//    public function __construct(
////        LoggerInterface $logger,
////        UserAddService $userAddService,
////        UserEditService $userEditService,
////        UserFindService $userFindService,
////        UserFindAllService $userFindAllService,
////        UserRemoveService $userRemoveService
//    )
//    {
////        $this->userAddService = $userAddService;
////        $this->userEditService = $userEditService;
////        $this->userFindService = $userFindService;
////        $this->userFindAllService = $userFindAllService;
////        $this->userRemoveService = $userRemoveService;
////        parent::__construct($logger);
//    }

}

