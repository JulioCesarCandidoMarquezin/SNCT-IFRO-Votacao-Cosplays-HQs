<?php
    
namespace App\DTO\HQ;

use App\Http\Requests\HQs\HQStoreRequest;

class HQStoreDTO
{
    public function __construct(
        public string $name,
        public string $autor_name,
        public string $class_name,
        public string $description,
        public string $images_path,
    ) { }

    public static function makeFromRequest(HQStoreRequest $request): self
    {
        return new self(
            name: $request->name,
            autor_name: $request->autor_name,
            class_name: $request->class_name,
            description: $request->description,
            images_path: $request->images_path,
        );
    }
}