<?php

namespace App\Imports;

use App\Imports\Sheets\ProductsByCategorySheet;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Concerns\Import;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ProductsImport implements Import, WithMultipleSheets
{
    protected ProductRepository $productRepo;
    protected ProductCategoryRepository $productCategoryRepo;
    protected Spreadsheet $spreadsheet;

    public function __construct(ProductRepository $productRepo, ProductCategoryRepository $productCategoryRepo, UploadedFile $file)
    {
        $this->productRepo = $productRepo;
        $this->productCategoryRepo = $productCategoryRepo;
        $this->spreadsheet = IOFactory::load($file->getRealPath());
    }

    public function sheets(): array
    {
        $sheets = [];
        $productCategories = $this->productCategoryRepo->getAll();

        foreach ($productCategories as $productCategory) {
            $worksheet = $this->spreadsheet->getSheetByName($productCategory->name);

            // skip kalau row kosong atau hanya ada header
            if ($worksheet && $worksheet->getHighestRow() > 1) {
                $sheets[$productCategory->name] = new ProductsByCategorySheet(
                    $productCategory->id,
                    $this->productRepo
                );
            }
        }

        return $sheets;
    }
}
