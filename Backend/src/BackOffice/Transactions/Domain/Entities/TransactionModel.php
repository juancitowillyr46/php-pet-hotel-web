<?php
namespace App\BackOffice\Transactions\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionModel extends Model
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
        'active'
    ];
    use SoftDeletes;
}