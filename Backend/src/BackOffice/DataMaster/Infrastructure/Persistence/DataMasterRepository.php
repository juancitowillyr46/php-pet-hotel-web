<?php
namespace App\BackOffice\DataMaster\Infrastructure\Persistence;

use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;
use Illuminate\Database\Capsule\Manager as DB;

class DataMasterRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new DataMasterModel());
    }

    public function generateIdRow(string $type): int {

        $countRows = $this->getModel()::all()->where('type', '=', $type)->count();

        $assignedId = 1;

        if($countRows > 0) {
            $dataMaster = $this->getModel()::withTrashed()->select("type", DB::raw("(MAX(id_row) + 1) as id"))
                ->groupBy('type')
                ->where('type', '=', $type)
                ->first();
            $assignedId = $dataMaster->id;
        }

        return $assignedId;

    }

}