<?php
    
namespace App\Service;

use App\DTO\Cosplays\CosplayStoreDTO;
use App\DTO\Cosplays\CosplayUpdateDTO;
use App\Repositories\Cosplay\CosplayRepositoryInterface;
use App\Repositories\Pagination\PaginationInterface;
use stdClass;

class CosplayService
{
    public function __construct(
        protected CosplayRepositoryInterface $repository,
    ) { }

    public function paginate(int $page = 1, int $totalPerPage = 15, array $filters = []): PaginationInterface
    {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filters: $filters
        ); 
    }

    public function index(array $filters = []): array
    {
        return $this->repository->getAll($filters);
    }

    public function findOne(String $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function store(CosplayStoreDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(CosplayUpdateDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}