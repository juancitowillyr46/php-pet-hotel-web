<?php
namespace App\BackOffice\Contacts\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ContactEditAction extends ContactsAction
{
    protected function action(): Response
    {
        try {

            $argUuid = $this->resolveArg('uuid');
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->contactService->executeEdit((array)$bodyParsed, $argUuid));

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}