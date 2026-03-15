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
        $about = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'about')->first();
        $aboutPreview = Section::where('section_key', 'about-preview')
            ->where('sections.is_active', 1)->first();

        return compact('about', 'aboutPreview');
    }

    private function products()
    {
        $sectionProduct = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'products')->first();
        $sectionProductPreview = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'products-preview')->where('sections.is_active', 1)->first();
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

        return compact('sectionProduct', 'sectionProductPreview', 'productCategoriesPreview', 'productsPreview');
    }

    private function articles()
    {
        $sectionArticle = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'articles')->first();
        $sectionArticlePreview = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'articles-preview')->where('sections.is_active', 1)->first();
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

        return compact('sectionArticle', 'sectionArticlePreview', 'articleCategoriesPreview', 'articlesPreview');
    }
}
