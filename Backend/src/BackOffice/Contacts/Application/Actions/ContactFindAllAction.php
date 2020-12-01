<?php
namespace App\BackOffice\Contacts\Application\Actions;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class ContactFindAllAction extends ContactsAction
{
    protected function action(): Response
    {
        try {
            $query = $this->request->getQueryParams();
            return $this->commandSuccess($this->contactService->executeGetAll($query));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}