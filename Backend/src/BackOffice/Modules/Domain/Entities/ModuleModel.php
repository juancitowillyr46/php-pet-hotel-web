<?php
namespace App\BackOffice\Modules\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "module";

    protected $fillable = [
        'id',
        'uuid',
        'slug',
        'icon',
        'parent_id',
        'is_parent',
        'is_children',
        'order',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'active'
    ];

    use SoftDeletes;

//    const UPDATED_AT = null;
//
//    public function permissions()
//    {
//        return $this->belongsToMany(PermissionModel::class, 'role_permission', 'role_id', 'permission_id');
//    }


}