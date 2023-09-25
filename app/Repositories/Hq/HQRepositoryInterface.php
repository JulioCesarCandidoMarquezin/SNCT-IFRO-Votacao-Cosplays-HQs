<?php
    
namespace App\Repositories\Hq;

use App\Repositories\Pagination\PaginationInterface;
use App\DTO\HQ\HQStoreDTO;
use App\DTO\HQ\HQUpdateDTO;
use stdClass;

interface HQRepositoryInterface 
{
    public function paginate(int $page = 1, int $totalPerPage = 15, array $filters = []): PaginationInterface;
    public function getAll(array $filters = []): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(HQStoreDTO $dto): stdClass;
    public function update(HQUpdateDTO $dto): stdClass|null;
}