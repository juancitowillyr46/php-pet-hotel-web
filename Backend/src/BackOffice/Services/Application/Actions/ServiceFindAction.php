<?php
namespace App\BackOffice\Services\Application\Actions;


use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ServiceFindAction extends ServicesAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->serviceService->executeGet($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}