<?php
namespace App\BackOffice\Transactions\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class TransactionRemoveAction extends TransactionsAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->bookingService->executeRemove($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}