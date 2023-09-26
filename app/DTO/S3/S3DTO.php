<?php
    
namespace App\DTO\S3;

use App\Http\Requests\S3\S3Request;

class S3DTO 
{
    public function __construct(
        public object $file,
        public string $path,
        public string $name,
    ) {}

    public static function makeFromRequest(S3Request $request, $path): self
    {
        return new self(
            file: $request->file,
            path: $request->path ?? $path,
            name: $request->name.'.'.$request->file->extension(),
        );
    }
}