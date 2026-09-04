<?php

namespace App\Repositories;

use App\Models\ArticleCategory;

class ArticleCategoryRepository
{
    protected ArticleCategory $articleCategory;

    public function __construct(ArticleCategory $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }

    public function getAll()
    {
        return $this->articleCategory->orderBy('id', 'desc')->get();
    }

    public function getActive()
    {
        return $this->articleCategory->where('is_active', 1)->get();
    }

    public function getById(int $id)
    {
        return $this->articleCategory->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->articleCategory->create($data);
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
