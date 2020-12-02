<?php
namespace App\BackOffice\Payments\Domain\Entities;

use App\BackOffice\Bookings\Domain\Entities\BookingModel;
use App\BackOffice\Roles\Domain\Entities\RoleModel;
use App\BackOffice\Services\Domain\Entities\ServiceModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "payment";

    protected $fillable = [
        'id',
        'uuid',
        'bank_id',
        'payment_method_id',
        'screen_voucher',
        'state_id',
        'date',
        'billing_first_name',
        'billing_last_name',
        'billing_dni',
        'billing_email',
        'billing_address',
        'billing_phone',
        'total',
        //'booking_id',
        'customer_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'active'
    ];

    use SoftDeletes;

    //protected $with = ['bookings'];

    public function bookings()
    {
        return $this->belongsToMany(BookingModel::class, 'booking_payment', 'payment_id', 'booking_id')->withPivot('payment_id','booking_id');
    }

    public function services()
    {
        return $this->belongsToMany(ServiceModel::class, 'service_payment', 'payment_id', 'service_id')->withPivot('payment_id','service_id');
    }

}