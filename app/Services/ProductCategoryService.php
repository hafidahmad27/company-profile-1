<?php

namespace App\Services;

use App\Repositories\ProductCategoryRepository;

class ProductCategoryService
{
    protected ProductCategoryRepository $productCategoryRepo;

    public function __construct(ProductCategoryRepository $productCategoryRepo)
    {
        $this->productCategoryRepo = $productCategoryRepo;
    }

    public function getCategories()
    {
        return $this->productCategoryRepo->getAll();
    }

    public function getCategoryDetail(int $id)
    {
        return $this->productCategoryRepo->getById($id);
    }

    public function getCategoryOptions()
    {
        return $this->productCategoryRepo->getActive();
    }

    public function create(array $data)
    {
        $this->productCategoryRepo->create($data);

        return 'Product category created successfully.';
    }

    public function update(int $id, array $data)
    {
        $this->productCategoryRepo->update($id, $data);

        return 'Product category updated successfully.';
    }

    public function delete(int $id)
    {
        $this->productCategoryRepo->delete($id);

        return 'Product category deleted successfully.';
    }

    public function setActiveStatus(int $id)
    {
        $productCategory = $this->productCategoryRepo->getById($id);
        $isActive = $productCategory->is_active ? 0 : 1;

        $this->productCategoryRepo->update($id, [
            'is_active' => $isActive
        ]);

        return $isActive
            ? 'Kategori berhasil diaktifkan.'
            : 'Kategori berhasil dinonaktifkan.';
    }
}
