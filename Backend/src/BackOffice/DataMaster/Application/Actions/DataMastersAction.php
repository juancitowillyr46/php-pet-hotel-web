<?php
namespace App\BackOffice\DataMaster\Application\Actions;


use App\BackOffice\DataMaster\Domain\Services\DataMasterService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class DataMastersAction extends Action
{
    public DataMasterService $dataMasterService;

    public function __construct(LoggerInterface $logger, DataMasterService $dataMasterService)
    {
        $this->dataMasterService = $dataMasterService;
        parent::__construct($logger);
    }
}

