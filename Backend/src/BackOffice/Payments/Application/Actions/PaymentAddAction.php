<?php
namespace App\BackOffice\Payments\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class PaymentAddAction extends PaymentsAction
{
    protected function action(): Response
    {
        try {

            $bodyParsed = $this->getFormData();
            $success = $this->paymentService->executeAdd((array)$bodyParsed);

            // Order
            if($success){
                if(count($bodyParsed->order) > 0){
                    $order = $bodyParsed->order;
                    foreach ($order as $item) {
                        $item = (array)$item;
                        $item['paymentId'] = $success->id;
                        $item['active'] = true;
                        $this->paymentOrderService->executeAdd($item);
                    }
                }
            }

            return $this->commandSuccess($success);
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}