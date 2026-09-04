<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Filesystem\Factory as FilesystemFactory;

class FileUploadService
{
    protected FilesystemFactory $storage;

    public function __construct(FilesystemFactory $storage)
    {
        $this->storage = $storage;
    }

    public function upload(UploadedFile $file, string $path, string $disk)
    {
        return $this->storage->disk($disk)->putFile($path, $file);
    }

    public function update(UploadedFile $file, string $oldPath = null, string $path, string $disk)
    {
        if ($oldPath) {
            $this->delete($oldPath, $disk);
        }
        return $this->upload($file, $path, $disk);
    }

    public function move(string $oldPath, string $newPath, string $disk)
    {
        return $this->storage->disk($disk)->move($oldPath, $newPath);
    }

    public function delete(string $path, string $disk)
    {
        return $this->storage->disk($disk)->delete($path);
    }
}
