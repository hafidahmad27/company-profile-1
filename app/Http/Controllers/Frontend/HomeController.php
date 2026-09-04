<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Section;

class HomeController extends Controller
{
    public function index()
    {
        return view(
            'front-end.index',
            array_merge(
                $this->carousel(),
                $this->about(),
                $this->products(),
                $this->articles()
            )
        );
    }

    private function carousel()
    {
        $carouselSlides = Section::where('section_key', 'carousel')->where('is_active', 1)->orderBy('order')->get();

        return compact('carouselSlides');
    }

    private function about()
    {
        $sectionAboutPreview = Section::where('section_key', 'about-preview')
            ->where('sections.is_active', 1)->first();

        return compact('sectionAboutPreview');
    }

    private function products()
    {
        $product = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'products')
            ->select('pages.slug', 'pages.title')
            ->first();

        $sectionProductPreview = Section::where('section_key', 'products-preview')
            ->where('sections.is_active', 1)
            ->select('title', 'subtitle', 'button_text', 'button_link', 'is_active')
            ->first();
        $productCategoriesPreview = ProductCategory::where('is_active', 1)->get();
        $productsPreview = [];

        foreach ($productCategoriesPreview as $category) {
            $productsPreview[$category->id] = Product::join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                ->select(
                    'product_categories.slug as category_slug',
                    'products.*'
                )
                ->where('product_category_id', $category->id)
                ->where('is_published', 1)
                ->orderBy('published_at', 'desc')
                ->limit(4)
                ->get();
        }

        return compact('product', 'sectionProductPreview', 'productCategoriesPreview', 'productsPreview');
    }

    private function articles()
    {
        $article = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'articles')
            ->select('pages.slug', 'pages.title')
            ->first();

        $sectionArticlePreview = Section::where('section_key', 'articles-preview')
            ->where('sections.is_active', 1)
            ->select('title', 'subtitle', 'button_text', 'button_link', 'is_active')
            ->first();
        $articleCategoriesPreview = ArticleCategory::where('is_active', 1)->get();
        $articlesPreview = [];

        foreach ($articleCategoriesPreview as $category) {
            $articlesPreview[$category->id] = Article::join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
                ->select(
                    'article_categories.slug as category_slug',
                    'articles.*'
                )
                ->where('article_category_id', $category->id)
                ->where('is_published', 1)
                ->orderBy('published_at', 'desc')
                ->limit(3)
                ->get();
        }

        return compact('article', 'sectionArticlePreview', 'articleCategoriesPreview', 'articlesPreview');
    }
}
