<?php
namespace App\BackOffice\Payments\Domain\Entities;

use App\BackOffice\Roles\Domain\Entities\RoleModel;
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
        'booking_id',
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
}