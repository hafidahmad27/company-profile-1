<?php

namespace App\Exports;

use App\Exports\Sheets\ProductsByCategorySheet;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Maatwebsite\Excel\Concerns\Export;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProductsExport implements Export, WithMultipleSheets
{
    protected ProductRepository $productRepo;
    protected ProductCategoryRepository $productCategoryRepo;
    protected bool $isTemplate;

    public function __construct(ProductRepository $productRepo, ProductCategoryRepository $productCategoryRepo, bool $isTemplate = false)
    {
        $this->productRepo = $productRepo;
        $this->productCategoryRepo = $productCategoryRepo;
        $this->isTemplate = $isTemplate;
    }

    public function sheets(): array
    {
        $sheets = [];
        $productCategories = $this->productCategoryRepo->getAll();

        foreach ($productCategories as $productCategory) {
            $sheets[$productCategory->name] = new ProductsByCategorySheet(
                $productCategory->id,
                $this->productCategoryRepo,
                $this->productRepo,
                $this->isTemplate
            );
        }

        return $sheets;
    }
}
