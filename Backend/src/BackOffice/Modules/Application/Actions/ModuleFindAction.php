<?php
namespace App\BackOffice\Modules\Application\Actions;


use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ModuleFindAction extends ModulesAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->moduleService->executeGet($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}