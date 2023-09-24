<?php

namespace App\Service;

use App\DTO\S3\S3DTO;
use Illuminate\Support\Facades\Storage;

class S3Service
{
    protected $storage;

    public function __construct()
    {
        $this->storage = Storage::disk('s3');
    }

    public function getAll($prefix = null): array
    {
        return $prefix ? $this->storage->files($prefix) : $this->storage->allFiles();
    }

    public function findOne(string $path): string|null
    {
        return $this->storage->get($path);
    }

    public function store(S3DTO $dto): bool
    {
        return $this->storage->put($dto->path, $dto->file);
    }

    public function update(S3DTO $dto): bool
    {
        return $this->storage->put($dto->path.$dto->name, $dto->file);
    }

    public function delete(string $path): bool
    {
        return $this->storage->delete($path);
    }
}
