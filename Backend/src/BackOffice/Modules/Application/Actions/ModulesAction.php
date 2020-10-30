<?php
namespace App\BackOffice\Modules\Application\Actions;

use App\BackOffice\Modules\Domain\Services\ModuleService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class ModulesAction extends Action
{
    public ModuleService $moduleService;

    public function __construct(LoggerInterface $logger, ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
        parent::__construct($logger);
    }
}

