<?php
namespace App\BackOffice\Payments\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class PaymentEditStateAction extends PaymentsAction
{
    protected function action(): Response
    {
        try {

            $argUuid = $this->resolveArg('uuid');
            $bodyParsed = $this->getFormData();
            return $this->commandSuccess($this->paymentService->executeEditState((array)$bodyParsed, $argUuid));

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}