<?php
namespace App\BackOffice\Kennels\Application\Actions;


use App\BackOffice\Kennels\Domain\Services\KennelService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class KennelsAction extends Action
{
    public KennelService $kennelService;

    public function __construct(LoggerInterface $logger, KennelService $kennelService)
    {
        $this->kennelService = $kennelService;
        parent::__construct($logger);
    }
}

