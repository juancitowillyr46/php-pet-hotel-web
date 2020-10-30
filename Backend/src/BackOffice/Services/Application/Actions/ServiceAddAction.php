<?php
namespace App\BackOffice\Services\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ServiceAddAction extends ServicesAction
{
    protected function action(): Response
    {
        try {
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->serviceService->executeAdd((array)$bodyParsed));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}