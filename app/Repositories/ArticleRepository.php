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

    public function getArticlePopular()
    {
        return $this->article->leftJoin('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->select(
                'article_categories.name as category_name',
                'article_categories.slug as category_slug',
                'articles.*'
            )
            ->where('is_published', 1)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();
    }

    // public function getArticleViewsPerMonth()
    // {
    //     return $this->article->join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
    //         ->selectRaw('
    //             MONTHNAME(published_at) as month_name, 
    //             SUM(views) as total,
    //             article_categories.name as category_name
    //         ')
    //         ->where('is_published', 1)
    //         ->groupByRaw('
    //             MONTH(published_at),
    //             article_categories.name
    //         ')
    //         ->orderByRaw('MONTH(published_at)')
    //         ->get();
    // }

    public function getArticleByCategory()
    {
        return $this->article->join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->selectRaw('COUNT(articles.id) as total_article, article_categories.name as category_name')
            ->where('is_published', 1)
            ->groupBy('article_category_id')
            ->get();
    }

    public function getTotalArticle()
    {
        return $this->article->where('is_published', 1)->count();
    }

    public function getTotalArticleDraft()
    {
        return $this->article->where('is_published', 0)->count();
    }

    public function getTotalArticleCategory()
    {
        return $this->article->join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->selectRaw('COUNT(DISTINCT article_category_id) as total_category')
            ->where('is_published', 1)
            ->value('total_category');
    }

    // public function getTotalArticleCategoryPopular()
    // {
    //     return $this->article->join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
    //         ->selectRaw('COUNT(DISTINCT article_category_id) as total_popular_category')
    //         ->where('is_published', 1)
    //         ->where('views', '>=', 5)
    //         ->value('total_popular_category');
    // }

    public function getTotalViews()
    {
        return $this->article->leftJoin('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->selectRaw('SUM(views) as total_views')
            ->where('is_published', 1)
            ->value('total_views');
    }

    public function getById(int $id)
    {
        return $this->article->findOrFail($id);
    }

    public function getByCategoryId(int $id)
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
