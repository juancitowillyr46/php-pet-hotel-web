<?php
namespace App\BackOffice\Payments\Application\Actions;


use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class PaymentFindAction extends PaymentsAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            $success = $this->paymentService->executeGet($argUuid);
            if($success) {
                $success->order = $this->paymentOrderService->executeGetAllDetail(['paymentId' => $success->id]);
            }
            return $this->commandSuccess($success);
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}