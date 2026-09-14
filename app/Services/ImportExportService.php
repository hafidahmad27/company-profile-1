<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Concerns\Import;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportService
{
    public function import(Import $import, UploadedFile $file)
    {
        Excel::import($import, $file);
    }

    public function export($export, string $filename)
    {
        return Excel::download($export, $filename);
    }
}
