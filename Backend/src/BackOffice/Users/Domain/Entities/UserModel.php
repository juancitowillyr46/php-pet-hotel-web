<?php
namespace App\BackOffice\Users\Domain\Entities;

use App\BackOffice\Roles\Domain\Entities\RoleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "user";

    protected $fillable = [
        'id',
        'uuid',
        'email',
        'username',
        'password',
        'blocked',
        'role_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'first_name',
        'last_name',
        'active'
    ];

    protected $with = ['role'];

    use SoftDeletes;

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id', 'id');
    }

}