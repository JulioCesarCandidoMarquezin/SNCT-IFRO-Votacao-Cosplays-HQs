<?php
    
namespace App\DTO\HQ;

use App\Http\Requests\HQs\HQUpdateRequest;

class HQUpdateDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $autor_name,
        public string $class_name,
        /**
         * @var string[]
         */
        public array $tags,
        public string $description,
        public string $image_path,
    ) { }

    public static function makeFromRequest(HQUpdateRequest $request): self
    {
        return new self(
            id: $request->id,
            name: $request->name,
            autor_name: $request->autor_name,
            class_name: $request->class_name,
            tags: $request->tags,
            description: $request->description,
            image_path: $request->image_path,
        );
    }
}