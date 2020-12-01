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

            $kennelsNotAvailable = $this->bookingService->getKennelsNotAvailableByDateToAndDateFrom($query['dateFrom'], $query['dateTo']);

//            $pets = [];
//            for ($i = 0; $i < $query['numPets']; $i++) {
//                $pets[] = 'OK';
//            }

            $getKennels = array_values($this->kennelService->getKennelsAvailableSearch($kennelsNotAvailable));

            $success['numKennels'] = count($getKennels);

            return $this->commandSuccess($success);

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}