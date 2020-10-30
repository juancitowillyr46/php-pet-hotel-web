<?php
namespace App\BackOffice\Roles\Application\Actions;

use App\BackOffice\Roles\Domain\Services\RoleService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class RolesAction extends Action
{
    public RoleService $roleService;

    public function __construct(LoggerInterface $logger, RoleService $roleService)
    {
        $this->roleService = $roleService;
        parent::__construct($logger);
    }
}

