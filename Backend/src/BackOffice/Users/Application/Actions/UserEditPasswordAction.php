<?php


namespace App\BackOffice\Users\Application\Actions;


use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class UserEditPasswordAction extends UsersAction
{
    protected function action(): Response
    {
        try {

            $argUuid = $this->resolveArg('uuid');
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->userService->executeEditPassword((array)$bodyParsed, $argUuid));

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}