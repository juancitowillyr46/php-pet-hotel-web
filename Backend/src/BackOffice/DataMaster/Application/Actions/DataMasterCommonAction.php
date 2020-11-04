<?php
namespace App\BackOffice\DataMaster\Application\Actions;

use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class DataMasterCommonAction  extends DataMastersAction
{
    protected function action(): Response
    {
        try {
            $type = $this->resolveArg('type');
            return $this->commandSuccess($this->dataMasterService->executeCommonType($type));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}