<?php
    
namespace App\Repositories\Cosplay;

use App\DTO\Cosplays\CreateCosplayDTO;
use App\DTO\Cosplays\UpdateCosplayDTO;
use App\Models\Cosplay;
use App\Repositories\Pagination\PaginationInterface;
use App\Repositories\Pagination\PaginationPresenter;
use Illuminate\Support\Facades\Schema;
use stdClass;

class CosplayEloquentORM implements CosplayRepositoryInterface
{
    public function __construct(
        protected Cosplay $model,
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

        return (object) $support->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateCosplayDTO $dto): stdClass
    {
        $support = $this->model->create((array) $dto);

        return (object) $support->toArray();
    }

    public function update(UpdateCosplayDTO $dto): stdClass|null
    {
        $support = $this->model->find($dto->id);
        if(!$support) return null;

        $support->update((array) $dto);

        return (object) $support->toArray();
    }

}