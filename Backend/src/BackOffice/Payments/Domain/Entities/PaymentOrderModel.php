<?php
namespace App\BackOffice\Payments\Domain\Entities;

use App\BackOffice\Roles\Domain\Entities\RoleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentOrderModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "payment_order";

    protected $fillable = [
        'id',
        'uuid',
        'payment_id',
        'service_id',
        'quantity',
        'price',
        'subtotal',
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