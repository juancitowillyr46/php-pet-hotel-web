<?php


namespace App\BackOffice\DataMaster\Application\Actions;


use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class DataMasterCommonTypeAction  extends DataMastersAction
{
    protected function action(): Response
    {
        try {
            return $this->commandSuccess($this->dataMasterService->executeCommonType(new DataMasterModel(), 'TABLE_STATE_AUDIT'));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}