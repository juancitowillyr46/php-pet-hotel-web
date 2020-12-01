<?php
namespace App\BackOffice\Contacts\Application\Actions;


use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ContactFindAction extends ContactsAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            $success = $this->contactService->executeGet($argUuid);
            return $this->commandSuccess($success);
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}