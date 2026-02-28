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
            $slug === 'index'
                ? 'front-end.index'
                : 'front-end.' . $slug . '.index',
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

    public function show($page_slug, $category_slug, $slug)
    {
        $page = Page::where('slug', $page_slug)->where('is_active', 1)->firstOrFail();
        $section = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('pages.slug', $page_slug)
            ->where('sections.is_active', 1)
            ->firstOrFail();

        // Inisialisasi variabel agar tidak error di compact()
        $articleCategory = null;
        $article = null;
        $productCategory = null;
        $product = null;

        // Cek apakah kategori ada di ArticleCategory
        if (ArticleCategory::where('slug', $category_slug)->exists()) {
            $articleCategory = ArticleCategory::where('slug', $category_slug)->firstOrFail();
            $article = Article::where('slug', $slug)
                ->where('article_category_id', $articleCategory->id)
                ->where('is_published', 1)
                ->firstOrFail();
        }

        // Cek apakah kategori ada di ProductCategory
        elseif (ProductCategory::where('slug', $category_slug)->exists()) {
            $productCategory = ProductCategory::where('slug', $category_slug)->firstOrFail();
            $product = Product::where('slug', $slug)
                ->where('product_category_id', $productCategory->id)
                ->where('is_published', 1)
                ->firstOrFail();
        }

        return view(
            'front-end.' . $page_slug . '.show',
            array_merge(
                compact('page', 'section', 'article', 'articleCategory', 'productCategory', 'product'),
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

        $sectionProduct = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'products')->first();
        $productCategoriesPreview = ProductCategory::where('is_active', 1)->get();
        $productsPreview = Product::where('is_published', 1)->orderBy('published_at', 'desc')
            ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->select(
                'product_categories.slug as category_slug',
                'products.*'
            )
            ->get()
            ->groupBy('product_category_id');

        $sectionArticle = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('section_key', 'articles')->first();
        $articleCategoriesPreview = ArticleCategory::where('is_active', 1)->get();
        $articlesPreview = Article::where('is_published', 1)->orderBy('published_at', 'desc')
            ->join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->select(
                'article_categories.slug as category_slug',
                'articles.*'
            )
            ->get()
            ->groupBy('article_category_id');

        return compact('carouselSlides', 'about', 'sectionProduct', 'productCategoriesPreview', 'productsPreview', 'sectionArticle', 'articleCategoriesPreview', 'articlesPreview');
    }

    private function products()
    {
        $productCategories = ProductCategory::where('is_active', 1)->get();
        $products = Product::where('is_published', 1)->orderBy('published_at', 'desc')
            ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->select(
                'product_categories.slug as category_slug',
                'products.*'
            )
            ->get()
            ->groupBy('product_category_id');

        return compact('productCategories', 'products');
    }

    private function articles()
    {
        $articleCategories = ArticleCategory::where('is_active', 1)->get();
        $articles = Article::where('is_published', 1)->orderBy('published_at', 'desc')
            ->join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->select(
                'article_categories.slug as category_slug',
                'articles.*'
            )
            ->get()
            ->groupBy('article_category_id');

        return compact('articleCategories', 'articles');
    }

    private function settings()
    {
        $setting = Setting::first();

        return compact('setting');
    }
}
