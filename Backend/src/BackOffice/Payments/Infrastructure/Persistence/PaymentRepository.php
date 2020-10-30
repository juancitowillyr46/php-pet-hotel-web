<?php
namespace App\BackOffice\Payments\Infrastructure\Persistence;

use App\BackOffice\Payments\Domain\Entities\PaymentModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class PaymentRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new PaymentModel());
    }
}