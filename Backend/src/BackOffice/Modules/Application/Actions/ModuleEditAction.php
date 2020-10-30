<?php
namespace App\BackOffice\Modules\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ModuleEditAction extends ModulesAction
{
    protected function action(): Response
    {
        try {

            $argUuid = $this->resolveArg('uuid');
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->moduleService->executeEdit((array)$bodyParsed, $argUuid));

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}