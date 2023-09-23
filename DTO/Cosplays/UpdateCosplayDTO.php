<?php
    
namespace App\DTO\Cosplays;

use App\Http\Requests\Cosplays\CosplayUpdateRequest;

class UpdateCosplayDTO 
{
    public function __construct(
        public string $id,
        public string $image_path,
        public string $autor_name,
        public string $original_pinture_name,
        public string $description,
        public string $class_name,
    ) {}

    public static function makeFromRequest(CosplayUpdateRequest $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->image_path,
            $request->autor_name,
            $request->original_pinture_name,
            $request->description,
            $request->class_name,
        );
    }
}