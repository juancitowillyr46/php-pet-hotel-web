<?php
namespace App\BackOffice\Pets\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class PetAddAction extends PetsAction
{
    protected function action(): Response
    {
        try {
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->petService->executeAdd((array)$bodyParsed));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}