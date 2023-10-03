<?php
    
namespace App\Repositories\Hq;

use App\DTO\HQ\HQStoreDTO;
use App\DTO\HQ\HQUpdateDTO;
use App\Models\Hq;
use App\Repositories\Hq\HQRepositoryInterface;
use App\Repositories\Pagination\PaginationInterface;
use App\Repositories\Pagination\PaginationPresenter;
use App\Utils\Utils;
use Illuminate\Support\Facades\Schema;
use stdClass;

class HQEloquentORM implements HQRepositoryInterface
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
        $hq = $this->model->findOrFail($id);
        if(!$hq) return null;

        return (object) $hq->toArray();
    }

    public function new(HQStoreDTO $dto): stdClass
    {
        $hq = $this->model->create((array) $dto);

        return (object) $hq->toArray();
    }

    public function update(HQUpdateDTO $dto): stdClass|null
    {
        $hq = $this->model->find($dto->id);
        if (!$hq) return null;

        $hq->update((array) $dto);

        return (object) $hq->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}