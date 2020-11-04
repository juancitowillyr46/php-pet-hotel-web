<?php
namespace App\Shared\Domain\Services;

use App\BackOffice\DataMaster\Domain\Entities\DataMasterModel;
use App\Shared\Domain\Uuid;
use App\Shared\Exception\Commands\AddActionException;
use App\Shared\Exception\Commands\EditActionException;
use App\Shared\Exception\Commands\EditVerifiedArgActionException;
use App\Shared\Exception\Commands\FindActionException;
use App\Shared\Exception\Commands\FindAllActionException;
use App\Shared\Exception\Commands\NotEqualResourceException;
use App\Shared\Exception\Commands\RemoveActionException;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Psr\Log\LoggerInterface;
use stdClass;

class BaseService implements ServiceInterface
{

    private BaseRepository $baseRepository;
    public LoggerInterface $loggerInterface;

    public function __construct(LoggerInterface $loggerInterface, BaseRepository $baseRepository)
    {
        $this->loggerInterface = $loggerInterface;
        $this->baseRepository = $baseRepository;
    }

    public function add(array $request): bool
    {
        return $this->baseRepository->add($request);
    }

    public function edit(array $request, string $uuid): bool
    {
        $id = $this->baseRepository->getIdByUuid($uuid);
        $request['id'] = $id;
        $request['updated_at'] = date('Y-m-d H:i:s');
        $request['updated_by'] = 'ADMIN';
        return $this->baseRepository->edit($request, $id);
    }

    public function remove(string $uuid): bool
    {
        $id = $this->baseRepository->getIdByUuid($uuid);
        $request['active'] = false;
        $request['deleted_at'] = date('Y-m-d H:i:s');
        $request['deleted_by'] = 'ADMIN';
        return $this->baseRepository->remove($request, $id);
    }

    public function read(string $uuid): array
    {
        $id = $this->baseRepository->getIdByUuid($uuid);
        return $this->baseRepository->read($id);
    }

    public function getAllRows(?array $query, bool $usingPaginate): object
    {
        $this->validatePagerParameters($query);
        return $this->baseRepository->getAllRows($query, $usingPaginate);
    }

    public function getIdByUuidModel(Model $model, string $uuid): int {
        $id = $this->baseRepository->getIdByUuidModel($model, $uuid);
        if($id == 0) {
            throw new FindActionException();
        }
        return $id;
    }

    public function getRowByIdModel(Model $model, int $id): array {
        $find = $this->baseRepository->getRowByIdModel($model, $id);
        if(!$find) {
            throw new FindActionException();
        }
        return $find;
    }

    public function compareArgs(string $uuid, string $argUuid): void {
        if($uuid !== $argUuid){
            throw new FindActionException();
        }
    }

    public function validatePagerParameters(array $query): void {

        if(count($query) == 0) {
            throw new Exception('No exist params');
        } else if(!array_key_exists('size', $query)) {
            throw new Exception('size not exist');
        } else if(!array_key_exists('page', $query)) {
            throw new Exception('page not exist');
        } else if( (int) $query['page'] < 1) {
            throw new Exception('Parameter not allowed');
        } else if( (int) $query['size'] < 1) {
            throw new Exception('Parameter not allowed');
        }

    }

    public function executeCommonType(string $type): array {
        $listCommon = [];
        $dataMaster = new DataMasterModel();

        $table = '';
        if($type == 'audit-status') {
            $table = 'TABLE_STATE_AUDIT';
        } else if($type == 'blocked-user') {
            $table = 'TABLE_BLOCKED_USER';
        } else if($type == 'is-booked') {
            $table = 'TABLE_IS_BOOKED';
        }

        $common = $dataMaster::all()->where('type', '=' ,$table)->toArray();

        if($type == 'audit-status' || $type == 'blocked-user' || $type == 'is-booked'){
            foreach ($common as $item) {
                $listCommon[] = ['value' => $item['id_row'] == 1, 'text' => $item['name']];
            }
        } else {
            foreach ($common as $item) {
                $listCommon[] = ['value' => $item['id'], 'text' => $item['name']];
            }
        }


        return $listCommon;
    }

    public function executeCommon(Model $model): array {
        $listCommon = [];
        $common = $model::all()->toArray();
        foreach ($common as $item) {
            $listCommon[] = ['value' => $item['uuid'], 'text' => $item['name']];
        }
        return $listCommon;
    }

}