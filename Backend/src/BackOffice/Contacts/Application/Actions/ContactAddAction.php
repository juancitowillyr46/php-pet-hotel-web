<?php
namespace App\BackOffice\Contacts\Application\Actions;

use App\Shared\Utility\EmailTplContact;
use App\Shared\Utility\EmailUtil;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ContactAddAction extends ContactsAction
{
    protected function action(): Response
    {
        try {
            $bodyParsed = $this->getFormData();
            $success = $this->contactService->executeAdd((array)$bodyParsed);

            $contactRequest = (array) $bodyParsed;

            if(is_object($success)){

                // Customer
//                $subject = 'Gracias por contactarte';
//                $body = "<div>Hola <b>".$contactRequest['name']."</b>, <br><br>¡Muchas gracias! por contactarte con nosotros</div><br>";
//                $body .= "<p>En breve nos comunicaremos contigo</p><br>";
//                $body .= "<p>¡Nos vemos!.</p>";

                $subject = 'Gracias por contactarte';
                $emailTplContact = new EmailTplContact();
                $emailTplContact->setPath('http://www.pethotelshangrila.pe/wp-content/themes/pethotel/');
                $body = $emailTplContact->getContent();

                $witMailer = new EmailUtil($this->logger);
                $witMailer->sendEmail($contactRequest['email'], $contactRequest['name'] , $subject, $body);

                // WebSite
                $subject = 'Nuevo Contacto desde la Web';
                $body = '';
                $body = "<div>".utf8_decode("Alguien quiere contactarse y dejó sus datos")."</div><br>";
                $body .= "<div>Nombres completos:</div>" . "<div><b>".$contactRequest['name']."</b></div><br>";
                $body .= "<div>".utf8_decode("Correo electrónico"). ":</div>" . "<div><b>".$contactRequest['email']."</b></div><br>";
                $body .= "<div>Mensaje:</div>" . "<div><b>".$contactRequest['message']."</b></div><br>";

                $witMailer = new EmailUtil($this->logger);
                $witMailer->sendEmail('developer@pethotelshangrila.pe', 'Info', $subject, $body);

            }

            return $this->commandSuccess($success);

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}