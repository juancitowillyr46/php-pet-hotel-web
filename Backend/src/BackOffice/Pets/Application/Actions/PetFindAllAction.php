<?php
namespace App\BackOffice\Pets\Application\Actions;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class PetFindAllAction extends PetsAction
{
    protected function action(): Response
    {
        try {
            $query = $this->request->getQueryParams();
            return $this->commandSuccess($this->petService->executeGetAll($query));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}