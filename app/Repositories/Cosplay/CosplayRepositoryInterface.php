<?php
    
namespace App\Repositories\Cosplay;

use App\DTO\Cosplays\CosplayStoreDTO;
use App\DTO\Cosplays\CosplayUpdateDTO;
use App\Repositories\Pagination\PaginationInterface;
use stdClass;

interface CosplayRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, array $filters = []): PaginationInterface;
    public function getAll(array $filters = []): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CosplayStoreDTO $dto): stdClass;
    public function update(CosplayUpdateDTO $dto): stdClass|null;
}