<?php
namespace App\BackOffice\Pets\Application\Actions;


use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class PetFindAction extends PetsAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->petService->executeGet($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}