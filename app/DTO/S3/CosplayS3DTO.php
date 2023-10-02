<?php

namespace App\DTO\S3;

use App\Http\Requests\S3\CosplayS3Request;

class CosplayS3DTO 
{
    public function __construct(
        /**
         * @var object[]
         */
        public array $images,
        public string $path,
    ) {}

    public static function makeFromRequest(CosplayS3Request $request, $path): self
    {
        $cosplay_image = $request->file('cosplay');
        $pinture_image = $request->file('pinture');
        $name = pathinfo($pinture_image->getClientOriginalName(), PATHINFO_FILENAME);
        
        return new self(
            images: [
                $cosplay_image, 
                $pinture_image
            ],
            path: ($request->path ?? $path) . '/' . $name,
        );
    }
}
