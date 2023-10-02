<?php

namespace App\DTO\S3;

use App\Http\Requests\S3\HqS3Request;

class HqS3DTO 
{
    public function __construct(
        /**
         * @var object[]
         */
        public array $images,
        public string $path,
    ) {}

    public static function makeFromRequest(HqS3Request $request, $path): self
    {
        $images = $request->file('images');
        $name = pathinfo($images[0]->getClientOriginalName(), PATHINFO_FILENAME);
        
        return new self(
            images: $images,
            path: ($request->path ?? $path) . '/' . $name,
        );
    }
}
