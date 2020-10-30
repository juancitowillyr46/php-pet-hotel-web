<?php
namespace App\BackOffice\Roles\Application\Actions;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class RoleFindAllAction extends RolesAction
{
    protected function action(): Response
    {
        try {
            $query = $this->request->getQueryParams();
            return $this->commandSuccess($this->roleService->executeGetAll($query));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}