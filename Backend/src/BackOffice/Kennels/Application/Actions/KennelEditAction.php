<?php
namespace App\BackOffice\Kennels\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class KennelEditAction extends KennelsAction
{
    protected function action(): Response
    {
        try {

            $argUuid = $this->resolveArg('uuid');
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->kennelService->executeEdit((array)$bodyParsed, $argUuid));

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}