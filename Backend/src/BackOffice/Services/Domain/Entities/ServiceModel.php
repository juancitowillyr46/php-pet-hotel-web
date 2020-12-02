<?php
namespace App\BackOffice\Services\Domain\Entities;

use App\BackOffice\Payments\Domain\Entities\PaymentModel;
use App\BackOffice\Roles\Domain\Entities\RoleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "service";

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'description',
        'image',
        'main',
        'image',
        'price',
        'service_type_id',
        'plan_id',
        'visible_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'active',
        'order'
    ];

    protected $with = ['payments'];

    use SoftDeletes;

    public function payments()
    {
        return $this->belongsToMany(PaymentModel::class, 'service_payment', 'service_id', 'payment_id')->withPivot('payment_id','service_id');
    }
}