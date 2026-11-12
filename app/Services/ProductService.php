<?php

namespace App\Services;

use App\Exports\ProductsExport;
use App\Exports\Sheets\ProductsByCategorySheet;
use App\Imports\ProductsImport;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Traits\GenerateUploadPathTrait;
use Illuminate\Http\UploadedFile;

class ProductService
{
    use GenerateUploadPathTrait;

    public function __construct(
        protected FileUploadService $fileUploadService,
        protected ImportExportService $importExportService,
        protected ProductRepository $productRepo,
        protected ProductCategoryRepository $productCategoryRepo
    ) {}

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
                $this->productRepo->getPageSlug(),
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
            $this->productRepo->getPageSlug(),
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

    public function updateOrCreate(int $productCategoryId, array $row) // For Import Excel
    {
        $this->productRepo->updateOrCreate(
            [
                'id' => $row['id']
            ],
            [
                'product_category_id' => $productCategoryId,
                'name' => $row['name'] ?? ('Untitled-' . uniqid()),
                'price' => $row['price'],
                'description' => $row['description']
            ]
        );
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

    public function import(UploadedFile $file)
    {
        $productCategories = $this->productCategoryRepo->getAll();
        $import = new ProductsImport($productCategories, $this, $file);

        $this->importExportService->import($import, $file);

        return 'Products Imported successfully.';
    }

    public function export(bool $isTemplate = false)
    {
        $sheets = [];
        $productCategories = $this->productCategoryRepo->getAll();

        foreach ($productCategories as $productCategory) {
            $products = $isTemplate ? collect([]) :
                $this->productRepo->getByCategoryId($productCategory->id)
                ->map(fn($product) => [
                    'id'      => $product->id,
                    'name'   => $product->name,
                    'price' => $product->price,
                    'description' => $product->description,
                ]);

            $sheets[$productCategory->name] = new ProductsByCategorySheet(
                $productCategory->name,
                $products
            );
        }

        $export = new ProductsExport($sheets);
        $page = $this->productRepo->getPageSlug();
        $filename = $page . ($isTemplate ? '_template.xlsx' : '_data.xlsx');

        return $this->importExportService->export($export, $filename);
    }

    public function getBestSellers()
    {
        $bestSellers = $this->productRepo->getBestSellers();

        return $bestSellers;
    }

    public function setBestSeller(int $id)
    {
        $product = $this->productRepo->getById($id);
        $isBestSeller = $product->is_best_seller ? 0 : 1;

        $this->productRepo->updateWithoutTimestamp($id, [
            'is_best_seller' => $isBestSeller,
        ]);

        return $isBestSeller
            ? 'Product berhasil ditandai sebagai Best Seller.'
            : 'Product berhasil dihapus dari Best Seller.';
    }
}
