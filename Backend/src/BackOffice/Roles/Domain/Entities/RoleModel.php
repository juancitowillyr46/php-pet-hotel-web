<?php
namespace App\BackOffice\Roles\Domain\Entities;

use App\BackOffice\Modules\Domain\Entities\ModuleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "role";

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'description',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'active'
    ];

    protected $with = ['modules'];

    use SoftDeletes;

//    const UPDATED_AT = null;
//
    public function modules()
    {
        return $this->belongsToMany(ModuleModel::class, 'role_module', 'role_id', 'module_id');
    }


}