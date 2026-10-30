<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    public function index()
    {
        $articleCategories = ArticleCategory::join('articles', 'articles.article_category_id', '=', 'article_categories.id')
            ->where('articles.is_published', 1)
            ->select(
                'article_categories.*',
            )
            ->distinct()
            ->orderBy('article_categories.name', 'asc')
            ->get();
        $articles = [];

        foreach ($articleCategories as $category) {
            $articles[$category->id] = Article::join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
                ->select(
                    'article_categories.slug as category_slug',
                    'articles.*'
                )
                ->where('article_category_id', $category->id)
                ->where('is_published', 1)
                ->orderBy('published_at', 'desc')
                ->paginate(6);
        }
        $defaultArticleCategoryId = $articleCategories->isNotEmpty() ? request()->get('tab', $articleCategories->first()->id) : null;

        return view('front-end.articles.index', compact('articleCategories', 'articles', 'defaultArticleCategoryId'));
    }

    public function show(string $category_slug, string $slug)
    {
        $articleCategory = ArticleCategory::where('slug', $category_slug)->firstOrFail();
        $article = Article::join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->leftJoin('users', 'articles.user_id', '=', 'users.id')
            ->select(
                'articles.*',
                'article_categories.name as category_name',
                'users.name as user_name',
            )
            ->where('articles.slug', $slug)
            ->where('article_category_id', $articleCategory->id)
            ->where('is_published', 1)
            ->firstOrFail();

        $key = 'article_viewed_' . $article->id;
        if (!session()->has($key)) {
            Article::withoutTimestamps(function () use ($article) {
                $article->increment('views');
            });

            session()->put($key, true);
        }

        return view('front-end.articles.show', compact('articleCategory', 'article'));
    }
}
