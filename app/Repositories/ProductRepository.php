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

    public function getById(int $id)
    {
        return $this->product->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->product->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->getById($id)->delete();
    }

    public function getFolderByPageSlug()
    {
        // return (new Product())->getTable();
        $page = Page::where('id', '3')->firstOrFail();
        return $page->slug;
    }
}
