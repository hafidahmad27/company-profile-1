<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Page;

class ArticleRepository
{
    protected Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getAll()
    {
        return $this->article->leftJoin('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->leftJoin('users', 'articles.user_id', '=', 'users.id')
            ->select(
                'articles.*',
                'article_categories.name as category_name',
                'users.name as user_name',
            )
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getDetail(int $id)
    {
        return $this->article->leftJoin('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->leftJoin('users', 'articles.user_id', '=', 'users.id')
            ->select(
                'articles.*',
                'article_categories.name as category_name',
                'users.name as user_name',
            )
            ->where('articles.id', $id)
            ->firstOrFail();
    }

    public function getById(int $id)
    {
        return $this->article->findOrFail($id);
    }

    public function getByCategory(int $id)
    {
        return $this->article->where('article_category_id', $id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function create(array $data)
    {
        return $this->article->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }

    public function updateOrCreate(array $conditions, array $data)
    {
        return $this->article->updateOrCreate($conditions, $data);
    }

    public function delete(int $id)
    {
        return $this->getById($id)->delete();
    }

    public function getPageSlug()
    {
        // return (new Article())->getTable();
        $page = Page::where('id', '4')->firstOrFail();
        return $page->slug;
    }
}
