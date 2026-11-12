<?php

namespace App\Imports;

use App\Imports\Sheets\ProductsByCategorySheet;
use App\Services\ProductService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Import;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ProductsImport implements Import, WithMultipleSheets
{
    protected Spreadsheet $spreadsheet;

    public function __construct(
        private Collection $productCategories,
        private ProductService $productService,
        UploadedFile $file
    ) {
        $this->spreadsheet = IOFactory::load($file->getRealPath());
    }

    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->productCategories as $productCategory) {
            $worksheet = $this->spreadsheet->getSheetByName($productCategory->name);

            // skip kalau row kosong atau hanya ada header
            if ($worksheet && $worksheet->getHighestRow() > 1) {
                $sheets[$productCategory->name] = new ProductsByCategorySheet(
                    $productCategory->id,
                    $this->productService
                );
            }
        }

        return $sheets;
    }
}
