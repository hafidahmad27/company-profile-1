<?php

namespace App\Imports;

use App\Imports\Sheets\ArticlesByCategorySheet;
use App\Services\ArticleService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Import;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ArticlesImport implements Import, WithMultipleSheets
{
    protected Spreadsheet $spreadsheet;

    public function __construct(
        private Collection $articleCategories,
        private ArticleService $articleService,
        UploadedFile $file
    ) {
        $this->spreadsheet = IOFactory::load($file->getRealPath());
    }

    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->articleCategories as $articleCategory) {
            $worksheet = $this->spreadsheet->getSheetByName($articleCategory->name);

            // skip kalau row kosong atau hanya ada header
            if ($worksheet && $worksheet->getHighestRow() > 1) {
                $sheets[$articleCategory->name] = new ArticlesByCategorySheet(
                    $articleCategory->id,
                    $this->articleService
                );
            } elseif (!$worksheet) {
                throw new \Exception(
                    'Nama sheet harus sama dengan nama kategori yang ada di database.'
                );
            }
        }

        return $sheets;
    }
}
