<?php

namespace App\Traits;

trait GenerateUploadPathTrait
{
    protected function generateUploadPath(string $pageName, string $slug = null): string
    {
        // jika nama tabel mengandung pemisah spasi (_), ubah menjadi strip (-) agar sesuai dengan format folder
        $folderName = str_replace('_', '-', $pageName);
        return $slug ? 'images/' . $folderName . '/' . $slug : 'images/' . $folderName;
    }
}
