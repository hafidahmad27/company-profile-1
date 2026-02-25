<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Section;
use App\Models\Setting;

class CompanyProfileController extends Controller
{
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->where('is_active', 1)->firstOrFail();
        $section = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('pages.slug', $slug)
            ->where('sections.is_active', 1)
            ->firstOrFail();

        return view(
            'front-end.' . $slug . '',
            array_merge(
                compact('page', 'section'),
                $this->pages(),
                $this->home(),
                $this->products(),
                $this->articles(),
                $this->settings()
            )
        );
    }

    private function pages()
    {
        $pages = Page::where('is_active', 1)->orderBy('order')->get();

        return compact('pages');
    }

    private function home()
    {
        $carouselSlides = Section::where('section_key', 'carousel')->where('is_active', 1)->orderBy('order')->get();

        $about = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'about')->first();

        $product = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'products')->first();
        $productCategoriesPreview = ProductCategory::where('is_active', 1)->get();
        $productsPreview = Product::where('is_published', 1)->orderBy('published_at', 'desc')->get()
            ->groupBy('product_category_id');

        $article = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'articles')->first();
        $articleCategoriesPreview = ArticleCategory::where('is_active', 1)->get();
        $articlesPreview = Article::where('is_published', 1)->orderBy('published_at', 'desc')->get()
            ->groupBy('article_category_id');

        return compact('carouselSlides', 'about', 'product', 'productCategoriesPreview', 'productsPreview', 'article', 'articleCategoriesPreview', 'articlesPreview');
    }

    private function products()
    {
        $productCategories = ProductCategory::where('is_active', 1)->get();
        $products = Product::where('is_published', 1)->orderBy('published_at', 'desc')->get()
            ->groupBy('product_category_id');

        return compact('productCategories', 'products');
    }

    private function articles()
    {
        $articleCategories = ArticleCategory::where('is_active', 1)->get();
        $articles = Article::where('is_published', 1)->orderBy('published_at', 'desc')->get()
            ->groupBy('article_category_id');

        return compact('articleCategories', 'articles');
    }

    private function settings()
    {
        $setting = Setting::first();

        return compact('setting');
    }
}
