<?php
    
namespace App\Repositories\Vote;

use App\DTO\Vote\VoteStoreDTO;
use App\DTO\Vote\VoteUpdateDTO;
use App\Models\Vote;

class VoteEloquentORM implements VoteRepositoryInteface
{
    protected Vote $model;

    public function __construct(Vote $model) 
    { 
        $this->model = $model;
    }

    public function vote(VoteStoreDTO $dto): bool
    {
        $existingVote = $this->model
            ->where('user_id', $dto->user_id)
            ->where('class_name', $dto->class_name)
            ->where('item_type', $dto->item_type)
            ->first();

        if ($existingVote) return false;
        
        Vote::create([
            'user_id' => $dto->user_id,
            'class_name' => $dto->class_name,
            'item_type' => $dto->item_type,
            'item_id' => $dto->item_id,
        ]);

        return true;
    }

    public function score(VoteUpdateDTO $dto): int
    {
        $totalVotes = $this->model->where('id', $dto->id)->count();
                        
        return $totalVotes;
    }

    public function update(VoteUpdateDTO $dto): bool
    {
        $vote = $this->model::findOrFail($dto->id);

        $vote->class_name = $dto->class_name;
        $vote->item_type = $dto->item_type;
        $vote->item_id = $dto->item_id;

        $vote->save();

        return true;
    }

    public function delete(VoteUpdateDTO $dto): bool
    {
        $vote = $this->model::findOrFail($dto->id);
        $vote->delete();

        return true;
    }
}