<?php
namespace App\BackOffice\Security\Application\Actions;

use App\Shared\Action\ActionError;
use App\Shared\Action\ActionPayload;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class LoginWebAction extends SecurityAction
{
    protected function action(): Response
    {
        try {
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->securityService->executeLoginManager((array)$bodyParsed, false));
        } catch (Exception $ex) {
            return $this->commandError($ex, ActionPayload::STATUS_UNAUTHORIZED, ActionError::UNAUTHENTICATED);
        }
    }
}