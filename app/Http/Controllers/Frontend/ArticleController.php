<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Page;
use App\Models\Section;

class ArticleController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'articles')->where('is_active', 1)->firstOrFail();
        $section = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('pages.slug', 'articles')
            ->where('sections.is_active', 1)
            ->firstOrFail();

        $articleCategories = ArticleCategory::where('is_active', 1)->get();
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

        return view('front-end.articles.index', compact('page', 'section', 'articleCategories', 'articles', 'defaultArticleCategoryId'));
    }

    public function show($category_slug, $slug)
    {
        $page = Page::where('slug', 'articles')->where('is_active', 1)->firstOrFail();
        $section = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('pages.slug', 'articles')
            ->where('sections.is_active', 1)
            ->firstOrFail();

        $articleCategory = ArticleCategory::where('slug', $category_slug)->firstOrFail();
        $article = Article::join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->join('users', 'articles.user_id', '=', 'users.id')
            ->select(
                'articles.*',
                'article_categories.name as category_name',
                'users.name as user_name',
            )
            ->where('articles.slug', $slug)
            ->where('article_category_id', $articleCategory->id)
            ->where('is_published', 1)
            ->firstOrFail();

        return view('front-end.articles.show', compact('page', 'section', 'articleCategory', 'article'));
    }
}
