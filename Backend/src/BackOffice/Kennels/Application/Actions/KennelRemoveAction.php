<?php
namespace App\BackOffice\Kennels\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class KennelRemoveAction extends KennelsAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->kennelService->executeRemove($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}