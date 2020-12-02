<?php
namespace App\Shared\Infrastructure\Persistence;

//use App\BackOffice\Purchases\Domain\Entities\PurchaseModel;
use App\Shared\Domain\Entities\PaginateEntity;
use App\Shared\Domain\Repository\RepositoryInterface;
use App\Shared\Exception\Commands\FindActionException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Exception;
use Psr\Log\LoggerInterface;
use stdClass;
use Throwable;
use Illuminate\Database\Capsule\Manager as DB;

class BaseRepository implements RepositoryInterface
{
//    private LoggerInterface $loggerInterface;

    private Model $model;

//    public function __construct(LoggerInterface $loggerInterface)
//    {
//        $this->loggerInterface = $loggerInterface;
//    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setModel(Model $model): void
    {
        $this->model = $model;
    }

    public function add(array $request): bool
    {
        $add = $this->getModel()::create($request);
        return $add->save();
    }

    public function edit(array $request, int $id): bool
    {
        $edit = $this->getModel()::all()->find($id);
        return $edit->update($request);
    }

    public function remove(array $request, int $id): bool
    {
        $delete = $this->getModel()::all()->find($id);
        $delete->update($request);
        return $delete->delete();
    }

    public function read(int $id): array
    {
        return $this->getModel()::all()->find($id)->toArray();
    }

    public function getAllRows(?array $query, bool $usingPaginate): object
    {

        if($usingPaginate == true){

            $findAll = $this->getModel()::all()->sortByDesc('id')
                  ->skip(((int)$query['page'] - 1) * $query['size'])
                  ->take((int)$query['size'])
                  ->toArray();


        } else {
            $findAll = $this->getModel()::all()->toArray();
        }

        $paginate = new PaginateEntity();
        $paginate->setRows($findAll);
        $paginate->setTotalRows($this->getModel()::all()->count());
        $paginate->setTotalPages(ceil($this->getModel()::all()->count()/(int)$query['size']));
        return $paginate;

    }

    public function getAllRowsFilter(?array $query, bool $usingPaginate): object
    {
        $findAllResult = [];
        if($usingPaginate == true){

            $findAll = $this->getModel()::all()
                ->where('created_at', '>=',($query['dateFrom'])? $query['dateFrom'].' 00:00:00' : date('Y-m-d').' 00:00:00')
                ->where('created_at', '<=',($query['dateTo'])? $query['dateTo'].' 23:59:00' : date('Y-m-d').' 23:59:00');

            if($query['stateId']){
                $findAll->where('state_id', '=',$query['stateId']);
            }

            $findAllResult = $findAll->sortByDesc('id')
                ->skip(((int)$query['page'] - 1) * $query['size'])
                ->take((int)$query['size'])
                ->toArray();

            // $findAll = $this->filterDate($this->getModel()::all(), $query);
            // query()->whereBetween(DB::raw('DATE(created_at)'), ['2020-11-30','2020-11-30']);

            // $dff = $findAll->get();
//                ->whereBetween('created_at', ['2020-11-30 00:00:00','2020-11-30 23:59:00']);
//                ->where('created_at', '>=','2020-11-30 00:00:00')
//                ->where('created_at', '<=', '2020-11-30 23:59:00');
//                ->where('created_at', '>=',Carbon::parse('2020-11-30 00:00:00'))
//                ->where('created_at', '<=', Carbon::parse('2020-11-30 23:59:00'));
//            ->where(DB::raw('DATE(created_at)'), '=', '2020-11-30');
            //->whereDate(DB::raw('DATE(created_at)'), '=', '2020-11-30');
//            ->where(DB::raw('DATE(created_at)'), '<=','2020-11-30');
//            ->where(DB::raw('DATE(created_at)'), '<=', '2020-11-30 23:59:00');

//            ->whereBetween(DB::raw('DATE(created_at)'), ['2020-11-30','2020-11-30']);



        } else {
            $findAll = $this->getModel()::all()->toArray();
        }

        $paginate = new PaginateEntity();
        $paginate->setRows($findAllResult);
        $paginate->setTotalRows($findAll->count());
        $paginate->setTotalPages(ceil($findAll->count()/(int)$query['size']));
        return $paginate;

    }

//    public function filterDate($model, $query) {
//        $model->all()->where('created_at', '>=',($query['createdFrom'])? $query['createdFrom'].' 00:00:00' : date('Y-m-d'))
//        ->where('created_at', '<=',($query['createdFrom'])? $query['createdFrom'].' 23:59:00' : date('Y-m-d'));
//        return $model;
//    }

    /*
     * Get Id by Uuid
     * */
    public function getIdByUuid(string $uuid): int {
        $find = $this->model::all()->where('uuid', '=' ,$uuid)->first();
        if(!$find) {
            throw new FindActionException();
        }
        return $find->getAttribute('id');
    }

    /*
    * Verified exist row
    * */
    public function getExistRowByAttr(string $key, string $value, string $uuid): bool {
        $count = $this->model::all()->where($key, $value)->where('uuid', '!=', $uuid)->count();
        return $count > 0;
    }


    /*
    * Get Id by Uuid with model
    * */
    public function getIdByUuidModel(Model $model, string $uuid): int {
        $find = $model::all()->where('uuid', '=' ,$uuid)->first();
        return ($find)? $find->getAttribute('id') : 0;
    }

    /*
    * Get Attr by Uuid with model
    * */
    public function getAttrByUuidModel(Model $model, string $uuid, string $attr) {
        $find = $model::all()->where('uuid', '=' ,$uuid)->first();
        return ($find)? $find->getAttribute($attr) : null;
    }

    /*
    * Ubicar un recurso relacionado
    * */
    public function getAttrByUuidModelWithAttr(Model $model, $key, $value): ?array {
        $find = $model::all()->where($key, '=' ,$value)->first();
        return ($find)? $find->toArray() : null;
    }

    /*
    * Get Row(Array) by Uuid with model
    * */
    public function getRowByIdModel(Model $model, int $id): ?array {
        $find = $model::all()->find($id);
        return ($find)? $find->toArray() : null;
    }

    /*
* Get Row(Array) by Uuid with model
* */
    public function getRowByIdModelByTable(Model $model, int $id, string $table): ?array {
        $find = $model::all()->where('type', '=' ,$table)->where('id_row', '=' ,$id)->first();
        return ($find)? $find->toArray() : null;
    }

}