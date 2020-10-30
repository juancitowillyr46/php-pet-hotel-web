<?php
namespace App\BackOffice\Payments\Application\Actions;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class PaymentFindAllAction extends PaymentsAction
{
    protected function action(): Response
    {
        try {
            $query = $this->request->getQueryParams();
            $success = $this->paymentService->executeGetAll($query);
            if($success){
                $rows = $success->rows;
                foreach ($rows as $row) {
                    $row->order = $this->paymentOrderService->executeGetAllDetail(['paymentId' => $row->id]);
                }
                $success->data->rows = $rows;
            }
            return $this->commandSuccess($success);

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}