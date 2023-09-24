<?php
    
namespace App\DTO\Cosplays;

use App\Http\Requests\Web\Cosplays\CosplayStoreRequest;

class CosplayStoreDTO 
{
    public function __construct(
        public string $image_path,
        public string $autor_name,
        public string $original_pinture_name,
        public string $description,
        public string $class_name,
    ) { }

    public static function makeFromRequest(CosplayStoreRequest $request): self
    {
        return new self(
            $request->image_path,
            $request->autor_name,
            $request->original_pinture_name,
            $request->description,
            $request->class_name,
        );
    }
}