<?php
namespace App\BackOffice\Services\Application\Actions;

use App\BackOffice\Services\Domain\Services\ServiceService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class ServicesAction extends Action
{
    public ServiceService $serviceService;

    public function __construct(LoggerInterface $logger, ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
        parent::__construct($logger);
    }
}

