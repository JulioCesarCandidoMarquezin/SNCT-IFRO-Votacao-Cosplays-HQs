<?php
    
namespace App\Repositories\Vote;

use App\DTO\Vote\VoteStoreDTO;
use App\DTO\Vote\VoteUpdateDTO;
use App\Http\Requests\Votes\VoteStoreRequest;

interface VoteRepositoryInteface
{
    public function vote(VoteStoreRequest $dto): bool;
    public function score(VoteStoreDTO $dto): int;
    public function update(VoteUpdateDTO $dto): bool;
    public function delete(VoteUpdateDTO $dto): bool;
}