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

    public function getAll($prefix = null)
    {
        return $prefix ? $this->storage->files($prefix) : $this->storage->allFiles();
    }

    public function findOne(string $path)
    {
        return $this->storage->get($path);
    }

    public function store(S3DTO $dto)
    {
        $extension = $dto->file->extension();
        return $this->storage->put($dto->path, $dto->file);
    }

    public function update(S3DTO $dto)
    {
        return $this->storage->put($dto->path.$dto->name, $dto->file);
    }

    public function delete(S3DTO $dto)
    {
        return $this->storage->delete($dto->path);
    }
}
