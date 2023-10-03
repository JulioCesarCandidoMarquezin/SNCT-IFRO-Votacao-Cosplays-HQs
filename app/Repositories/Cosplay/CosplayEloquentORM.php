<?php
    
namespace App\Repositories\Cosplay;

use App\DTO\Cosplays\CosplayStoreDTO;
use App\DTO\Cosplays\CosplayUpdateDTO;
use App\Models\Cosplay;
use App\Repositories\Pagination\PaginationInterface;
use App\Repositories\Pagination\PaginationPresenter;
use App\Utils\Utils;
use Illuminate\Support\Facades\Schema;
use stdClass;

class CosplayEloquentORM implements CosplayRepositoryInterface
{
    protected Cosplay $model;

    public function __construct(Cosplay $model) 
    { 
        $this->model = $model;
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, array $filters = []): PaginationInterface
    {
        $query = $this->model->query();

        $tableColumns = Schema::getColumnListing($this->model->getTable());

        Utils::dinamicFilter($filters, $tableColumns, $query);

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function getAll(array $filters = []): array
    {
        $query = $this->model->query();

        $tableColumns = Schema::getColumnListing($this->model->getTable());

        Utils::dinamicFilter($filters, $tableColumns, $query);

        return $query->get()->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $cosplay = $this->model->find($id);
        if(!$cosplay) return null;

        return (object) $cosplay->toArray();
    }

    public function new(CosplayStoreDTO $dto): stdClass
    {
        $cosplay = $this->model->create((array) $dto);

        return (object) $cosplay->toArray();
    }

    public function update(CosplayUpdateDTO $dto): stdClass|null
    {
        $cosplay = $this->model->find($dto->id);
        if (!$cosplay) return null;

        $cosplay->update((array) $dto);

        return (object) $cosplay->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->find($id)->delete();
    }
}