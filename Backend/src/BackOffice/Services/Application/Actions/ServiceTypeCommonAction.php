<?php
namespace App\BackOffice\Services\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ServiceTypeCommonAction extends ServicesAction
{
    protected function action(): Response
    {
        try {
            return $this->commandSuccess($this->serviceService->serviceCommon());
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}