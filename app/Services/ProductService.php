<?php

namespace App\Services;

use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Traits\GenerateUploadPathTrait;

class ProductService
{
    use GenerateUploadPathTrait;

    protected FileUploadService $fileUploadService;
    protected ProductRepository $productRepo;
    protected ProductCategoryRepository $productCategoryRepo;

    public function __construct(FileUploadService $fileUploadService, ProductRepository $productRepo, ProductCategoryRepository $productCategoryRepo)
    {
        $this->fileUploadService = $fileUploadService;
        $this->productRepo = $productRepo;
        $this->productCategoryRepo = $productCategoryRepo;
    }

    public function getProducts()
    {
        $products = $this->productRepo->getAll();

        return $products;
    }

    public function getProductDetail(int $id)
    {
        $product = $this->productRepo->getDetail($id);

        return $product;
    }

    public function create(array $data)
    {
        $productCategory = $this->productCategoryRepo->getById($data['product_category_id']);

        // cek apakah ada file baru
        if (!empty($data['image'])) {
            // generate path sesuai tabel + slug kategori
            $uploadPath = $this->generateUploadPath(
                $this->productRepo->getFolderByPageSlug(),
                $productCategory->slug
            );
            // upload file ke storage
            $data['image'] = $this->fileUploadService->upload(
                $data['image'],
                $uploadPath,
                'public'
            );
        }

        $this->productRepo->create($data);

        return 'Product created successfully.';
    }

    public function update(int $id, array $data)
    {
        $product = $this->productRepo->getById($id);
        $productCategory = $this->productCategoryRepo->getById($data['product_category_id']);
        $oldPath = $product->image;

        // generate path sesuai tabel + slug kategori
        $uploadPath = $this->generateUploadPath(
            $this->productRepo->getFolderByPageSlug(),
            $productCategory->slug
        );
        // cek apakah ada file baru
        if (!empty($data['image'])) {
            // upload file ke storage
            $data['image'] = $this->fileUploadService->update(
                $data['image'],
                $oldPath,
                $uploadPath,
                'public'
            );
        } else {
            if (!empty($oldPath)) {
                // jika tidak ada file yg di-upload dan jika kategori diubah, maka file lama berpindah folder menyesuaikan kategori saat ini
                $newPath = $uploadPath . '/' . basename($oldPath);
                $this->fileUploadService->move($oldPath, $newPath, 'public');
                $data['image'] = $newPath;
            } else {
                // jika memang tidak ada file lama, maka tidak perlu panggil method move() dan cukup set null.
                $data['image'] = null;
            }
        }

        $this->productRepo->update($id, $data);

        return 'Product updated successfully.';
    }

    public function delete(int $id)
    {
        $product = $this->productRepo->getById($id);

        $this->productRepo->delete($id);

        if ($product->image) {
            $this->fileUploadService->delete($product->image, 'public');
        }

        return 'Product deleted successfully.';
    }

    public function setPublishedStatus(int $id)
    {
        $product = $this->productRepo->getById($id);
        $isPublished = $product->is_published ? 0 : 1;

        $this->productRepo->update($id,  [
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
        ]);

        return $isPublished
            ? 'Product berhasil dipublikasikan.'
            : 'Product berhasil disembunyikan.';
    }
}
