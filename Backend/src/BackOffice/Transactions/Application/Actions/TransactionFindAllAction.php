<?php
namespace App\BackOffice\Transactions\Application\Actions;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class TransactionFindAllAction extends TransactionsAction
{
    protected function action(): Response
    {
        try {
            $query = $this->request->getQueryParams();
            return $this->commandSuccess($this->bookingService->executeGetAll($query));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}