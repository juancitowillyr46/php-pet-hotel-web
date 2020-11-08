<?php
namespace App\BackOffice\Security\Application\Actions;

use App\Shared\Action\ActionError;
use App\Shared\Action\ActionPayload;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class RegisterWebAction extends SecurityAction
{
    protected function action(): Response
    {
        try {

            $bodyParsed = $this->getFormData();
            $validaBodyParsed = $this->securityService->executeRegisterWeb((array)$bodyParsed);
            $securityLogin = null;

            if(is_bool($validaBodyParsed) && $validaBodyParsed){

                $payloadUserAdd = [
                    'email' => $bodyParsed->username,
                    'username' => $bodyParsed->username,
                    'password' => $bodyParsed->password,
                    'roleId' => 'd2a466ae-d711-496c-9808-ad51abf76175',
                    'active' => true,
                    'blocked' => false
                ];

                $successUserAdd = $this->userService->executeAdd($payloadUserAdd);

                if(is_object($successUserAdd)){
                    $securityLogin = $this->securityService->executeLoginManager([
                        'username' => $bodyParsed->username,
                        'password' => $bodyParsed->password,
                    ], false);
                }

            }

            return $this->commandSuccess($securityLogin);

        } catch (Exception $ex) {
            return $this->commandError($ex, ActionPayload::STATUS_UNAUTHORIZED, ActionError::UNAUTHENTICATED);
        }
    }
}