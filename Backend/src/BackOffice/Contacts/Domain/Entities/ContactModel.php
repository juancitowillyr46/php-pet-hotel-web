<?php
namespace App\BackOffice\Contacts\Domain\Entities;

use App\BackOffice\Pets\Domain\Entities\PetModel;
use App\BackOffice\Roles\Domain\Entities\RoleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactModel extends Model
{
    const UPDATED_AT = null;

    public $timestamps = ["created_at", "updated_at", "deleted_at"];

    protected $table = "contact";

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'email',
        'message',
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