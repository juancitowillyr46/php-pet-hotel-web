<?php
namespace App\BackOffice\Pets\Domain\Entities;

use App\BackOffice\Roles\Domain\Entities\RoleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "pet";

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'age',
        'age_type',
        'gender',
        'race',
        'comments',
        'image',
        'customer_id',
        'weight',
        'size',
        'diseases',
        'veterinary',
        'veterinary_phone',
        'treatments',
        'last_vaccine',
        'is_agressive',
        'observation',
        'init_zeal',
        'last_zeal',
        'other',
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