<?php
namespace App\BackOffice\Bookings\Infrastructure\Persistence;

use App\BackOffice\Bookings\Domain\Entities\BookingModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class BookingRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new BookingModel());
    }
}