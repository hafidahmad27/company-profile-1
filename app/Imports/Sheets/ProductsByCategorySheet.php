<?php

namespace App\Imports\Sheets;

use App\Services\ProductService;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class ProductsByCategorySheet implements OnEachRow, WithHeadingRow
{
    public function __construct(
        private int $productCategoryId,
        private ProductService $productService
    ) {}

    public function onRow(Row $row): void
    {
        $this->productService->updateOrCreate(
            $this->productCategoryId,
            $row->toArray()
        );
    }
}
