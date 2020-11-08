<?php
namespace App\BackOffice\Transactions\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class TransactionEditAction extends TransactionsAction
{
    protected function action(): Response
    {
        try {

            $argUuid = $this->resolveArg('uuid');
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->bookingService->executeEdit((array)$bodyParsed, $argUuid));

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}