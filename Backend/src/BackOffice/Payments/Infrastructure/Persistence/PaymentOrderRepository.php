<?php
namespace App\BackOffice\Payments\Infrastructure\Persistence;

use App\BackOffice\Payments\Domain\Entities\PaymentModel;
use App\BackOffice\Payments\Domain\Entities\PaymentOrderModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class PaymentOrderRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new PaymentOrderModel());
    }
}