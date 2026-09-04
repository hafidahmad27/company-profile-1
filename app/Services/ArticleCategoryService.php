<?php

namespace App\Services;

use App\Repositories\ArticleCategoryRepository;

class ArticleCategoryService
{
    protected ArticleCategoryRepository $articleCategoryRepo;

    public function __construct(ArticleCategoryRepository $articleCategoryRepo)
    {
        $this->articleCategoryRepo = $articleCategoryRepo;
    }

    public function getCategories()
    {
        return $this->articleCategoryRepo->getAll();
    }

    public function getCategoryDetail(int $id)
    {
        return $this->articleCategoryRepo->getById($id);
    }

    public function getCategoryOptions()
    {
        return $this->articleCategoryRepo->getActive();
    }

    public function create(array $data)
    {
        $this->articleCategoryRepo->create($data);

        return 'Article category created successfully.';
    }

    public function update(int $id, array $data)
    {
        $this->articleCategoryRepo->update($id, $data);

        return 'Article category updated successfully.';
    }

    public function delete(int $id)
    {
        $this->articleCategoryRepo->delete($id);

        return 'Article category deleted successfully.';
    }

    public function setActiveStatus(int $id)
    {
        $articleCategory = $this->articleCategoryRepo->getById($id);

        $isActive = $articleCategory->is_active ? 0 : 1;
        $this->articleCategoryRepo->update($id, ['is_active' => $isActive]);

        return $isActive
            ? 'Kategori berhasil diaktifkan.'
            : 'Kategori berhasil dinonaktifkan.';
    }
}
