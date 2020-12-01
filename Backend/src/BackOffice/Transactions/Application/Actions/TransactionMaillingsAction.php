<?php
namespace App\BackOffice\Transactions\Application\Actions;

use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\Shared\Utility\EmailTplBooking;
use App\Shared\Utility\EmailTplPayment;
use App\Shared\Utility\EmailTplRegister;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class TransactionMaillingsAction extends TransactionsAction
{
    protected function action(): Response
    {

        // New Register
        /*$emailTpl = new EmailTplRegister();
        $emailTpl->setEmail('juan.rodas.manez@gmail.com');
        $emailTpl->setPassword('12345678');
        $emailTpl->setUrl('http://www.pethotelshangrila.pe/');
        $emailTpl->setPath('http://www.pethotelshangrila.pe/wp-content/themes/pethotel/');
        $body = $emailTpl->getContent();*/


        // Booking UUID register
        /* $bookingsUuid = [
            "79ffa916-2e83-11eb-acd5-e86a64228de9",
            "79f9852c-2e83-11eb-a7c9-e86a64228de9"
        ];
        $pets = [];
        foreach ($bookingsUuid as $booking) {
            // Booking Get Register
            $getBookingSuccess = (array) $this->bookingService->executeGet($booking);
            if(count($getBookingSuccess) > 0){
                // Pet Get Register
                $successPets = (array) $this->petService->executeGet($getBookingSuccess['petId']);
                $pets[] = $successPets['name'];
            }

        }

        // Payment Register
        $services = [];
        $paymentSuccess = $this->paymentService->executeGet('024dd6a4-1a4c-11eb-9d56-50e549398ade');
        if(is_object($paymentSuccess)){
            $services = (array) $this->paymentOrderService->executeGetAllDetail(['paymentId' => '024dd6a4-1a4c-11eb-9d56-50e549398ade']);
        }


        $emailTpl = new EmailTplBooking();
        $emailTpl->setCheckIn('2020-11-25');
        $emailTpl->setCheckOut('2020-11-26');
        $emailTpl->setServices($services);
        $emailTpl->setTotal($paymentSuccess->total);
        $emailTpl->setPets($pets);
        $body = $emailTpl->getContent(); */




//        $emailTpl = new EmailTplPayment();
//        $body = $emailTpl->getContent();

        //$subject = 'Reserva registrada';


        // Payment Register
        $services = [];
        $body = '';
        $emailTpl = new EmailTplPayment();
        $paymentSuccess = $this->paymentService->executeGet('7a0f5a64-2e83-11eb-8a28-e86a64228de9');

        $emailBookings = [];
        $bookings = $this->paymentService->executeGetBookingIds((int) $paymentSuccess->ticket);
        foreach ($bookings as $booking) {
            $petFind = $this->petService->getRowByIdModel(new PetModel(), $booking['pet_id']);
            $emailBookings[] = ['pet' => $petFind['name'], 'booking' => $booking];
        }

        if(is_object($paymentSuccess)){
            $paymentSuccess = (array) $paymentSuccess;
            $emailTpl->setMethodPaymentName($paymentSuccess['paymentMethodName']);
            $emailTpl->setTicket($paymentSuccess['ticket']);
            $emailTpl->setStatePayment($paymentSuccess['stateName']);
            $emailTpl->setGridTotal($paymentSuccess['total']);
            $emailTpl->setTotal($paymentSuccess['total']);
            $emailTpl->setBookings($emailBookings);
            $services = (array) $this->paymentOrderService->executeGetAllDetail(['paymentId' => '7a0f5a64-2e83-11eb-8a28-e86a64228de9']);
            $emailTpl->setServices($services);
            //$body = $emailTpl->getContent();
        }

        $body = $emailTpl->getContent();

        print $body;

        return $this->commandSuccess($body);
    }
}