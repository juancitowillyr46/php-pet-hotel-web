<?php
namespace App\BackOffice\Modules\Application\Actions;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ModuleFindAllAction extends ModulesAction
{
    protected function action(): Response
    {
        try {
            $query = $this->request->getQueryParams();
            return $this->commandSuccess($this->moduleService->executeGetAll($query));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}