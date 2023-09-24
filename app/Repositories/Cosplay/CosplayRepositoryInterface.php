<?php
    
namespace App\Repositories\Cosplay;

use App\Repositories\Pagination\PaginationInterface;
use App\DTO\Cosplays\CreateCosplayDTO;
use App\DTO\Cosplays\UpdateCosplayDTO;
use stdClass;

interface CosplayRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, array $filters = []): PaginationInterface;
    public function getAll(array $filters = []): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateCosplayDTO $dto): stdClass;
    public function update(UpdateCosplayDTO $dto): stdClass|null;
}