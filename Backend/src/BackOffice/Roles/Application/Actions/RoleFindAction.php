<?php
namespace App\BackOffice\Roles\Application\Actions;


use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class RoleFindAction extends RolesAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->roleService->executeGet($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}