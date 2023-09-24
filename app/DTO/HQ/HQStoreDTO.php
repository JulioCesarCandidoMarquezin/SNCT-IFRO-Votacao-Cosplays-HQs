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
            $request->name,
            $request->autor_name,
            $request->class_name,
            $request->tags,
            $request->description,
            $request->image_path,
        );
    }
}