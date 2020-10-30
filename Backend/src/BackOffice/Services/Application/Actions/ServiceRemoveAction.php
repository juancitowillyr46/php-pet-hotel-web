<?php
namespace App\BackOffice\Services\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ServiceRemoveAction extends ServicesAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->serviceService->executeRemove($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}