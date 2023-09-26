<?php
    
namespace App\Service;

use App\DTO\Vote\VoteStoreDTO;
use App\DTO\Vote\VoteUpdateDTO;
use App\Repositories\Vote\VoteRepositoryInterface;

class VoteService
{
    public function __construct(
        protected VoteRepositoryInterface $repository,
    ) { }

    public function vote(VoteStoreDTO $dto): bool
    {
        return $this->repository->vote($dto);
    }

    public function score(VoteUpdateDTO $dto): int
    {
        return $this->repository->score($dto);
    }

    public function update(VoteUpdateDTO $dto): bool
    {
        return $this->repository->update($dto);
    }

    public function delete(VoteUpdateDTO $dto): bool
    {
        return $this->repository->delete($dto);
    }
}