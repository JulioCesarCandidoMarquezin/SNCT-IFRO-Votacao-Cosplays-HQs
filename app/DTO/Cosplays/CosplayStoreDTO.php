<?php
    
namespace App\DTO\Cosplays;

use App\Http\Requests\Cosplays\CosplayStoreRequest;

class CosplayStoreDTO 
{
    public function __construct(
        public string $autor_name,
        public string $class_name,
        public string $pinture_name,
        public string $description,
        public string $cosplay_path,
        public string $pinture_path,
    ) { }

    public static function makeFromRequest(CosplayStoreRequest $request): self
    {
        return new self(
            autor_name: $request->autor_name,
            class_name: $request->class_name,
            pinture_name: $request->pinture_name,
            description: $request->description,
            cosplay_path: $request->cosplay_path,
            pinture_path: $request->pinture_path,
        );
    }
}