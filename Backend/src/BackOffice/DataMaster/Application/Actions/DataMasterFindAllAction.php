<?php
namespace App\BackOffice\DataMaster\Application\Actions;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class DataMasterFindAllAction extends DataMastersAction
{
    protected function action(): Response
    {
        try {
            $query = $this->request->getQueryParams();
            return $this->commandSuccess($this->dataMasterService->executeGetAll($query));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}