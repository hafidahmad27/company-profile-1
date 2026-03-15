<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Section;

class ProductController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'products')->where('is_active', 1)->firstOrFail();
        $section = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('pages.slug', 'products')
            ->where('sections.is_active', 1)
            ->firstOrFail();

        $productCategories = ProductCategory::where('is_active', 1)->get();
        $products = [];

        foreach ($productCategories as $category) {
            $products[$category->id] = Product::join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                ->select(
                    'product_categories.slug as category_slug',
                    'products.*'
                )
                ->where('product_category_id', $category->id)
                ->where('is_published', 1)
                ->orderBy('published_at', 'desc')
                ->paginate(6);
        }
        $defaultProductCategoryId = $productCategories->isNotEmpty() ? request()->get('tab', $productCategories->first()->id) : null;

        return view('front-end.products.index', compact('page', 'section', 'productCategories', 'products', 'defaultProductCategoryId'));
    }

    public function show($category_slug, $slug)
    {
        $page = Page::where('slug', 'products')->where('is_active', 1)->firstOrFail();
        $section = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('pages.slug', 'products')
            ->where('sections.is_active', 1)
            ->firstOrFail();

        $productCategory = ProductCategory::where('slug', $category_slug)->firstOrFail();
        $product = Product::join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select(
                'products.*',
                'product_categories.name as category_name',
                'users.name as user_name',
            )
            ->where('products.slug', $slug)
            ->where('product_category_id', $productCategory->id)
            ->where('is_published', 1)
            ->firstOrFail();

        return view('front-end.products.show', compact('page', 'section', 'productCategory', 'product'));
    }
}
