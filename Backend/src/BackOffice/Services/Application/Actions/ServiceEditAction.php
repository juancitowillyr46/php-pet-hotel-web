<?php
namespace App\BackOffice\Services\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ServiceEditAction extends ServicesAction
{
    protected function action(): Response
    {
        try {

            $argUuid = $this->resolveArg('uuid');
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->serviceService->executeEdit((array)$bodyParsed, $argUuid));

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}