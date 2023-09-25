<?php
    
namespace App\Service;

use App\DTO\HQ\HQStoreDTO;
use App\DTO\HQ\HQUpdateDTO;
use App\Repositories\Hq\HQRepositoryInterface;
use App\Repositories\Pagination\PaginationInterface;
use stdClass;

class HqService
{
    public function __construct(
        protected HQRepositoryInterface $repository,
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

    public function store(HQStoreDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(HQUpdateDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}