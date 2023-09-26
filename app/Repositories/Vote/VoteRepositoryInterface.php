<?php
    
namespace App\Repositories\Vote;

use App\DTO\Vote\VoteStoreDTO;
use App\DTO\Vote\VoteUpdateDTO;

interface VoteRepositoryInterface
{
    public function vote(VoteStoreDTO $dto): bool;
    public function score(VoteUpdateDTO $dto): int;
    public function update(VoteUpdateDTO $dto): bool;
    public function delete(VoteUpdateDTO $dto): bool;
}