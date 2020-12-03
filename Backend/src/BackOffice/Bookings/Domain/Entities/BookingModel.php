<?php
namespace App\BackOffice\Bookings\Domain\Entities;

use App\BackOffice\Payments\Domain\Entities\PaymentModel;
use App\BackOffice\Roles\Domain\Entities\RoleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "booking";

    protected $fillable = [
        'id',
        'uuid',
        'kennel_id',
        'state_id',
        'pet_id',
        'customer_id',
        'date_to',
        'date_from',
        'cancellation_date',
        'cancellation_note',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'is_doggy_school',
        'active'
    ];

    protected $with = ['payments'];

    use SoftDeletes;

    public function payments()
    {
        return $this->belongsToMany(PaymentModel::class, 'booking_payment', 'booking_id', 'payment_id')->withPivot('payment_id','booking_id');
    }

}