<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view(
            'front-end.index',
            array_merge(
                $this->carousel(),
                $this->aboutPreview(),
                $this->productCategoryBestSellersPreview(),
                $this->productBestSellersPreview(),
                $this->productsPreview(),
                $this->articleCategoryPopularPreview(),
                $this->articlePopularPreview(),
                $this->articlesPreview()
            )
        );
    }

    private function carousel()
    {
        $carouselSlides = Section::where('section_key', 'carousel')->where('is_active', 1)->orderBy('order', 'asc')->get();

        return compact('carouselSlides');
    }

    private function aboutPreview()
    {
        $sectionAboutPreview = Section::where('section_key', 'about-preview')
            ->where('sections.is_active', 1)->first();

        return compact('sectionAboutPreview');
    }

    private function productCategoryBestSellersPreview()
    {
        $sectionProductCategoryBestSellersPreview = Section::where('section_key', 'product-category-best-sellers-preview')
            ->where('sections.is_active', 1)
            ->first();

        $hasBestSellerProduct = Product::where('is_published', 1)
            ->where('products.is_best_seller', 1)
            ->exists();

        $productCategoryBestSellers = Product::join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->select(
                'product_categories.name as category_name',
                'products.product_category_id',
                // DB::raw('count(products.id) as total_best_seller'),
                'products.image'
            )
            ->where('is_published', 1)
            ->when($hasBestSellerProduct, function ($query) {
                $query->where('products.is_best_seller', 1);
            })
            ->groupBy('product_category_id')
            ->orderBy('category_name', 'asc')
            ->get();

        return compact('sectionProductCategoryBestSellersPreview', 'productCategoryBestSellers');
    }

    private function productBestSellersPreview()
    {
        $sectionProductBestSellerPreview = Section::where('section_key', 'product-best-sellers-preview')
            ->where('sections.is_active', 1)
            ->first();

        $hasBestSellerProduct = Product::where('is_published', 1)
            ->where('products.is_best_seller', 1)
            ->exists();

        $productBestSellers = Product::leftJoin('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->select(
                'product_categories.name as category_name',
                'product_categories.slug as category_slug',
                'products.*'
            )
            ->where('is_published', 1)
            ->when($hasBestSellerProduct, function ($query) {
                $query->where('products.is_best_seller', 1);
            })
            ->orderBy('category_name', 'asc')
            // ->orderBy('published_at', 'desc')
            // ->take(5)
            ->get();

        return compact('sectionProductBestSellerPreview', 'productBestSellers');
    }

    private function productsPreview()
    {
        $sectionProductPreview = Section::where('section_key', 'products-preview')
            ->where('sections.is_active', 1)
            ->first();

        $productCategoriesPreview = ProductCategory::join('products', 'products.product_category_id', '=', 'product_categories.id')
            ->where('products.is_published', 1)
            ->select(
                'product_categories.*',
            )
            ->distinct()
            ->orderBy('product_categories.name', 'asc')
            ->get();
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
                ->take(4)
                ->get();
        }

        return compact('sectionProductPreview', 'productCategoriesPreview', 'productsPreview');
    }

    private function articleCategoryPopularPreview()
    {
        $sectionArticleCategoryPopularPreview = Section::where('section_key', 'article-category-popular-preview')
            ->where('sections.is_active', 1)
            ->first();

        $hasPopularArticle = Article::where('is_published', 1)
            ->where('views', '>=', 5)
            ->exists();

        $articleCategoryPopular = Article::join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->select(
                'article_categories.name as category_name',
                'articles.article_category_id',
                // DB::raw('count(articles.id) as total'),
                'articles.image'
            )
            ->where('is_published', 1)
            ->when($hasPopularArticle, function ($query) {
                $query->where('articles.views', '>=', 5);
            })
            ->groupBy('article_category_id')
            ->orderBy('category_name', 'asc')
            ->get();

        return compact('sectionArticleCategoryPopularPreview', 'articleCategoryPopular');
    }

    private function articlePopularPreview()
    {
        $sectionArticlePopularPreview = Section::where('section_key', 'article-popular-preview')
            ->where('sections.is_active', 1)
            ->first();

        $articlePopular = Article::join('article_categories', 'articles.article_category_id', '=', 'article_categories.id')
            ->select(
                'article_categories.name as category_name',
                'article_categories.slug as category_slug',
                'articles.*'
            )
            ->where('is_published', 1)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return compact('sectionArticlePopularPreview', 'articlePopular');
    }

    private function articlesPreview()
    {
        $sectionArticlePreview = Section::where('section_key', 'articles-preview')
            ->where('sections.is_active', 1)
            ->first();

        $articleCategoriesPreview = ArticleCategory::join('articles', 'articles.article_category_id', '=', 'article_categories.id')
            ->where('articles.is_published', 1)
            ->select(
                'article_categories.*',
            )
            ->distinct()
            ->orderBy('article_categories.name', 'asc')
            ->get();
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
                ->take(3)
                ->get();
        }

        return compact('sectionArticlePreview', 'articleCategoriesPreview', 'articlesPreview');
    }
}
