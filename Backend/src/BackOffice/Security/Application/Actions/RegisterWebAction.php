<?php
namespace App\BackOffice\Security\Application\Actions;

use App\Shared\Action\ActionError;
use App\Shared\Action\ActionPayload;
use App\Shared\Utility\EmailPHP;
use App\Shared\Utility\EmailTplRegister;
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
                    'blocked' => '1cca03ea-07dc-11eb-ab06-50e549398ade2'
                ];

                $successUserAdd = $this->userService->executeAdd($payloadUserAdd);

                if(is_object($successUserAdd)){

                    $successCustomer = $this->customerService->executeAdd(
                        [
                            "firstName" => "",
                            "lastName" => "",
                            "phone" => "",
                            "address" => "",
                            "addressOptional" => "",
                            "addressReference" => "",
                            "comments" => "",
                            "userId" => $successUserAdd->id,
                            "image" => "",
                            "email" => $bodyParsed->username,
                            "active" => true,
                            "districtId" => ""
                        ]
                    );

                    if(is_object($successCustomer)) {
                        $successLogin = $this->securityService->executeLoginManager([
                            'username' => $bodyParsed->username,
                            'password' => $bodyParsed->password,
                        ], false);
                        if(is_object($successLogin)) {
                            try {

                                $subject = 'Bienvenid@ a Pethotelshangrila';

                                $emailTpl = new EmailTplRegister();
                                $emailTpl->setEmail($bodyParsed->username);
                                $emailTpl->setPassword($bodyParsed->password);
                                $emailTpl->setUrl('http://www.pethotelshangrila.pe/');
                                $emailTpl->setPath('http://www.pethotelshangrila.pe/wp-content/themes/pethotel/');
                                $body = $emailTpl->getContent();

                                $witMailer = new EmailUtil($this->logger);
                                $witMailer->sendEmail($bodyParsed->username, $bodyParsed->username , $subject, $body);

                            } catch (Exception $e) {
                                $this->logger->error('No envio correo');
                            }

                        }
                    }

                }

            }

            return $this->commandSuccess($successLogin);

        } catch (Exception $ex) {
            return $this->commandError($ex, ActionPayload::STATUS_UNAUTHORIZED, ActionError::UNAUTHENTICATED);
        }
    }
}