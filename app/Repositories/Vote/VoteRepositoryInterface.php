<?php
    
namespace App\Repositories\Vote;

use App\DTO\Vote\UpdateVoteDTO;
use App\Http\Requests\Votes\VoteStoreRequest;

interface VoteRepositoryInteface
{
    public function vote(VoteStoreRequest $dto): bool;
    public function score(UpdateVoteDTO $dto): int;
    public function update(UpdateVoteDTO $dto): bool;
    public function delete(UpdateVoteDTO $dto): bool;
}