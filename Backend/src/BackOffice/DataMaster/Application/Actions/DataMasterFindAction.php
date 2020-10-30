<?php
namespace App\BackOffice\DataMaster\Application\Actions;


use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class DataMasterFindAction extends DataMastersAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->dataMasterService->executeGet($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}