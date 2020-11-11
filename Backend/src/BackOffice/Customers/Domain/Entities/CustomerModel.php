<?php
namespace App\BackOffice\Customers\Domain\Entities;

use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\BackOffice\Roles\Domain\Entities\RoleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "customer";

    protected $fillable = [
        'id',
        'uuid',
        'first_name',
        'last_name',
        'phone',
        'address',
        'address_optional',
        'comments',
        'image',
        'user_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'active'
    ];

    // protected $with = ['pets'];

    use SoftDeletes;
//
//    public function pets()
//    {
//        return $this->hasMany(PetModel::class, 'customer_id', 'id');
//    }
}