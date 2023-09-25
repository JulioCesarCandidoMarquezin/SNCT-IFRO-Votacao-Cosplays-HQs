<?php
    
namespace App\DTO\HQ;

use App\Http\Requests\HQs\HQStoreRequest;

class HQStoreDTO
{
    public function __construct(
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

    public static function makeFromRequest(HQStoreRequest $request): self
    {
        return new self(
            name: $request->name,
            autor_name: $request->autor_name,
            class_name: $request->class_name,
            tags: $request->tags,
            description: $request->description,
            image_path: $request->image_path,
        );
    }
}