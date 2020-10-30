<?php
namespace App\BackOffice\Modules\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ModuleAddAction extends ModulesAction
{
    protected function action(): Response
    {
        try {
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->moduleService->executeAdd((array)$bodyParsed));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}