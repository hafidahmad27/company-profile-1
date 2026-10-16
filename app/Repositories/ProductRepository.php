<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Page;

class ProductRepository
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->leftJoin('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->leftJoin('users', 'products.user_id', '=', 'users.id')
            ->select(
                'products.*',
                'product_categories.name as category_name',
                'users.name as user_name',
            )
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getDetail(int $id)
    {
        return $this->product->leftJoin('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->leftJoin('users', 'products.user_id', '=', 'users.id')
            ->select(
                'products.*',
                'product_categories.name as category_name',
                'users.name as user_name',
            )
            ->where('products.id', $id)
            ->firstOrFail();
    }

    public function getBestSellers()
    {
        return $this->product->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->select(
                'product_categories.name as category_name',
                'products.*',
            )
            ->where('is_published', 1)
            ->orderBy('is_best_seller', 'desc')
            ->orderBy('category_name', 'asc')
            // ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getTopBestSellers()
    {
        return $this->product->leftJoin('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->select(
                'product_categories.name as category_name',
                'products.name',
            )
            ->where('is_published', 1)
            ->where('is_best_seller', 1)
            ->orderBy('category_name', 'asc')
            // ->orderBy('published_at', 'desc')
            // ->take(5)
            ->get();
    }

    public function getTotalProduct()
    {
        return $this->product->where('is_published', 1)->count();
    }

    public function getTotalProductCategory()
    {
        return $this->product->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->selectRaw('COUNT(DISTINCT product_category_id) as total_category')
            ->where('is_published', 1)
            ->value('total_category');
    }

    public function getTotalProductBestSeller()
    {
        return $this->product
            ->selectRaw('COUNT(id) as total_best_seller')
            ->where('is_published', 1)
            ->where('is_best_seller', 1)
            ->value('total_best_seller');
    }

    public function getTotalProductCategoryBestSeller()
    {
        return $this->product->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->selectRaw('COUNT(DISTINCT product_category_id) as total_category_best_seller')
            ->where('is_published', 1)
            ->where('is_best_seller', 1)
            ->value('total_category_best_seller');
    }

    public function getById(int $id)
    {
        return $this->product->findOrFail($id);
    }

    public function getByCategoryId(int $id)
    {
        return $this->product->where('product_category_id', $id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function create(array $data)
    {
        return $this->product->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }

    public function updateOrCreate(array $conditions, array $data)
    {
        return $this->product->updateOrCreate($conditions, $data);
    }

    public function updateWithoutTimestamp(int $id, array $data)
    {
        return $this->product->withoutTimestamps(function () use ($id, $data) {
            return $this->update($id, $data);
        });
    }

    public function delete(int $id)
    {
        return $this->getById($id)->delete();
    }

    public function getPageSlug()
    {
        // return (new Product())->getTable();
        $page = Page::where('id', '3')->firstOrFail();
        return $page->slug;
    }
}
