<?php

namespace App\Repositories;

use App\Models\ProductCategory;

class ProductCategoryRepository
{
    protected ProductCategory $productCategory;

    public function __construct(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
    }

    public function getAll()
    {
        return $this->productCategory->orderBy('id', 'desc')->get();
    }

    public function getActive()
    {
        return $this->productCategory->where('is_active', 1)->get();
    }

    public function getById(int $id)
    {
        return $this->productCategory->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->productCategory->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->getById($id)->findOrFail($id)->delete();
    }
}
