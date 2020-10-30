<?php
namespace App\BackOffice\Kennels\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class KennelAddAction extends KennelsAction
{
    protected function action(): Response
    {
        try {
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->kennelService->executeAdd((array)$bodyParsed));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}