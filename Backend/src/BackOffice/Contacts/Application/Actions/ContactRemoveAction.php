<?php
namespace App\BackOffice\Contacts\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ContactRemoveAction extends ContactsAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->contactService->executeRemove($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}