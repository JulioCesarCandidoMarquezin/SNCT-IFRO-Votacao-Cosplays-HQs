<?php

namespace App\Service;

use App\DTO\S3\CosplayS3DTO;
use App\DTO\S3\HqS3DTO;
use Illuminate\Support\Facades\Storage;

class S3Service
{
    protected $storage;

    public function __construct()
    {
        $this->storage = Storage::disk('s3');
    }

    public function getAll(string $prefix = null): array
    {
        return $prefix ? $this->storage->files($prefix) : $this->storage->allFiles();
    }

    public function getAllUrlsFromPath(string $prefix = null): array
    {
        $files_path = $this->getAll($prefix);
        foreach($files_path as $file_path) {
            $files_url[] = $this->findOne($file_path);
        }
        return $files_url;
    }

    public function findOne(string $path): string|null
    {
        return $this->storage->url($path);
    }

    public function store(CosplayS3DTO|HqS3DTO $dto): array
    {
        $store_path = $dto->path;
        $paths = [$store_path];

        foreach ($dto->images as $image) {
            $fileName = $image->getClientOriginalName();
            $path = $image->storeAs($dto->path, $fileName, 's3');            
            $paths[] = $path;
        }

        return $paths;
    }

    public function update(CosplayS3DTO|HqS3DTO $dto): bool
    {
        return $this->storage->put($dto->path, $dto->images);
    }

    public function delete(string $path): bool
    {
        return $this->storage->delete($path);
    }

    public function deleteDirectory(string $path): bool
    {
        return $this->storage->deleteDirectory($path);
    }
}
