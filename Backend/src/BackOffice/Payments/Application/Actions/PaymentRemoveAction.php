<?php
namespace App\BackOffice\Payments\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class PaymentRemoveAction extends PaymentsAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            return $this->commandSuccess($this->paymentService->executeRemove($argUuid));
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}