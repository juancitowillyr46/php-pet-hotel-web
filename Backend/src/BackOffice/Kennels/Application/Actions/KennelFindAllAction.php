<?php
namespace App\BackOffice\Kennels\Application\Actions;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class KennelFindAllAction extends KennelsAction
{
    protected function action(): Response
    {
        try {
            $query = $this->request->getQueryParams();
            return $this->commandSuccess($this->kennelService->executeGetAll($query));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}