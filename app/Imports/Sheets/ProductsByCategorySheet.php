<?php

namespace App\Imports\Sheets;

use App\Repositories\ProductRepository;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class ProductsByCategorySheet implements OnEachRow, WithHeadingRow
{
    protected int $productCategoryId;
    protected ProductRepository $productRepo;

    public function __construct(int $productCategoryId, ProductRepository $productRepo)
    {
        $this->productCategoryId = $productCategoryId;
        $this->productRepo = $productRepo;
    }

    public function onRow(Row $row): void
    {
        $data = $row->toArray();

        $this->productRepo->updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'product_category_id' => $this->productCategoryId,
                'name' => $data['name'] ?? ('Untitled-' . uniqid()),
                'price' => $data['price'],
                'description' => $data['description']
            ]
        );
    }
}
