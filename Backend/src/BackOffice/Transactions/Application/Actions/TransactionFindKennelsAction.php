<?php
namespace App\BackOffice\Transactions\Application\Actions;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;


class TransactionFindKennelsAction extends TransactionsAction
{
    protected function action(): Response
    {
        try {

            $query = $this->request->getQueryParams();

            $kennelsNotAvailable = $this->bookingService->getKennelsNotAvailableByDateToAndDateFrom($query['dateTo'], $query['dateFrom']);

            $pets = [];
            for ($i = 0; $i < $query['numPets']; $i++) {
                $pets[] = 'OK';
            }

            $getKennels = array_values($this->kennelService->getKennelsAvailable($kennelsNotAvailable, $pets));

            return $this->commandSuccess((count($getKennels) > 0));

        } catch (Exception $ex) {
            return $this->commandError($ex);
        }
    }
}