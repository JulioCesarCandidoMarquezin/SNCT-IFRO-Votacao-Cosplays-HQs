<?php
    
namespace App\DTO\Vote;

use App\Http\Requests\Votes\VoteStoreRequest;

class UpdateVoteDTO 
{
    public function __construct(
        public string $id,
        public string $user_id,
        public string $class_name,
        public string $item_type,
        public string $item_id,
    ) { }

    public static function makeFromRequest(VoteStoreRequest $request): self
    {
        return new self(
            $request->id,
            auth()->id(),
            $request->class_name,
            $request->item_type,
            $request->item_id,
        );
    }
}