<?php
namespace App\BackOffice\Customers\Application\Actions;


use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class CustomerFindAction extends CustomersAction
{
    protected function action(): Response
    {
        try {
            $argUuid = $this->resolveArg('uuid');
            $success = $this->customerService->executeGet($argUuid);
            if($success){
                $success->pets = $this->petService->executeGetAllByIdCustomer(['size' => 100, 'page' => 1, 'customerId' => $success->id]);
            }
            return $this->commandSuccess($success);
        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}