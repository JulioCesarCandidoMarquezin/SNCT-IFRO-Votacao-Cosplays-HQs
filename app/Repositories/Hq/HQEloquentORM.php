<?php
    
namespace App\Repositories\Cosplay;

use App\DTO\HQ\HQStoreDTO;
use App\DTO\HQ\HQUpdateDTO;
use App\Models\Hq;
use App\Repositories\Hq\HQReposistoryInterface;
use App\Repositories\Pagination\PaginationInterface;
use App\Repositories\Pagination\PaginationPresenter;
use Illuminate\Support\Facades\Schema;
use stdClass;
class HQEloquentORM implements HQReposistoryInterface
{
    protected Hq $model;

    public function __construct(Hq $model)
    {
        $this->model = $model;
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, array $filters = []): PaginationInterface
    {
        $query = $this->model->query();

        $tableColumns = Schema::getColumnListing($this->model->getTable());

        foreach ($filters as $column => $value) {
            if (in_array($column, $tableColumns)) {
                if (is_array($value)) {
                    $query->whereIn($column, $value);
                } elseif ($value !== null) {
                    $query->where($column, 'like', "%{$value}%");
                }
            }
        }

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function getAll(array $filters = []): array
    {
        $query = $this->model->query();

        $tableColumns = Schema::getColumnListing($this->model->getTable());

        foreach ($filters as $column => $value) {
            if (in_array($column, $tableColumns)) {
                if (is_array($value)) {
                    $query->whereIn($column, $value);
                } elseif ($value !== null) {
                    $query->where($column, 'like', "%{$value}%");
                }
            }
        }

        return $query->get()->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $support = $this->model->find($id);
        if(!$support) return null;

        return $support->toArray();
    }

    public function new(HQStoreDTO $dto): stdClass
    {
        $support = $this->model->create((array) $dto);

        return (object) $support->toArray();
    }

    public function update(HQUpdateDTO $dto): stdClass|null
    {
        $support = $this->model->find($dto->id);
        if (!$support) return null;

        $support->update((array) $dto);

        return (object) $support->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}