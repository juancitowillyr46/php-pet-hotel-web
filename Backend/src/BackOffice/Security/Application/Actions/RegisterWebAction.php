<?php
namespace App\BackOffice\Security\Application\Actions;

use App\Shared\Action\ActionError;
use App\Shared\Action\ActionPayload;
use App\Shared\Utility\EmailUtil;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class RegisterWebAction extends SecurityAction
{
    protected function action(): Response
    {
        try {

            $bodyParsed = $this->getFormData();
            $validaBodyParsed = $this->securityService->executeRegisterWeb((array)$bodyParsed);
            $successLogin = null;

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
                    $successLogin = $this->securityService->executeLoginManager([
                        'username' => $bodyParsed->username,
                        'password' => $bodyParsed->password,
                    ], false);
                    if(is_object($successLogin)) {
                        $subject = 'Bienvenid@ a Pethotelshangrila';
                        $body = "<div>Hola <b>".$bodyParsed->username."</b>, <br><br>Gracias por registrarte</div><br>";
                        $body .= "<div>Te indicamos tus datos de acceso a nuestra web:</div><br>";
                        $body .= "<div>Usuario: ".$bodyParsed->username."</div>";
                        $body .= "<div>Clave: ".$bodyParsed->password."</div>";
                        $body .= "<div>Web: <a href='http://www.pethotelshangrila.pe/' target='_blank'>Pethotelshangrila</a></div>";
                        $email = new EmailUtil();
                        $email->sendEmail('juan.rodas.manez@gmail.com', $bodyParsed->username , $subject, $body);
                    }
                }

            }

            return $this->commandSuccess($successLogin);

        } catch (Exception $ex) {
            return $this->commandError($ex, ActionPayload::STATUS_UNAUTHORIZED, ActionError::UNAUTHENTICATED);
        }
    }
}