<?php
namespace App\BackOffice\Services\Application\Actions;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ServiceFindAllAction extends ServicesAction
{
    protected function action(): Response
    {
        try {
            $query = $this->request->getQueryParams();
            return $this->commandSuccess($this->serviceService->executeGetAll($query));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}