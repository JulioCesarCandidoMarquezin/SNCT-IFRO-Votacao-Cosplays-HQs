<?php
    
namespace App\Repositories\Cosplay;

use App\DTO\HQ\HQStoreDTO;
use App\DTO\HQ\UpdateHQDTO;
use App\Models\Hq;
use App\Repositories\Hq\HQReposistoryInterface;
use App\Repositories\Pagination\PaginationInterface;
use App\Repositories\Pagination\PaginationPresenter;
use Illuminate\Support\Facades\Schema;
use stdClass;

class HQEloquentORM implements HQReposistoryInterface
{
    public function __construct(
        protected Hq $model,
    ) { }

    public function paginate(int $page = 1, int $totalPerPage = 15, array $filters = []): PaginationInterface
    {
        $query = $this->model->query();

        foreach ($filters as $column => $value) {
            if (Schema::hasColumn($this->model->getTable(), $column)) {
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

        foreach ($filters as $column => $value) {
            if (Schema::hasColumn($this->model->getTable(), $column)) {
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

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(HQStoreDTO $dto): stdClass
    {
        $support = $this->model->create((array) $dto);

        return $support->toArray();
    }

    public function update(UpdateHQDTO $dto): stdClass|null
    {
        $support = $this->model->find($dto->id);
        if(!$support) return null;

        $support->update($dto);

        return (object) $support->toArray();
    }

}