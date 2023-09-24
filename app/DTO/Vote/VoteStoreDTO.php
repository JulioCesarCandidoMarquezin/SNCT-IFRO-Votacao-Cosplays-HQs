<?php
    
namespace App\DTO\Vote;

use App\Http\Requests\Votes\VoteStoreRequest;

class VoteStoreDTO 
{
    public function __construct(
        public string $user_id,
        public string $class_name,
        public string $item_type,
        public string $item_id,
    ) { }

    public static function makeFromRequest(VoteStoreRequest $request): self
    {
        return new self(
            auth()->id(),
            $request->class_name,
            $request->item_type,
            $request->item_id,
        );
    }
}