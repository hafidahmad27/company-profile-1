<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;
    protected ProductCategoryService $productCategoryService;

    public function __construct(ProductService $productService, ProductCategoryService $productCategoryService)
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $products = $this->productService->getProducts();

        return view('back-end.products.index', compact('products'));
    }

    public function create()
    {
        $productCategoryOptions = $this->productCategoryService->getCategoryOptions();

        return view('back-end.products.create', compact('productCategoryOptions'));
    }

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $message = $this->productService->create($validatedData);

        return redirect()->route('be.products.index')
            ->with('success', $message);
    }

    public function show(int $id)
    {
        $product = $this->productService->getProductDetail($id);

        return view('back-end.products.show', compact('product'));
    }

    public function edit(int $id)
    {
        $product = $this->productService->getProductDetail($id);
        $productCategoryOptions = $this->productCategoryService->getCategoryOptions();

        return view('back-end.products.edit', compact('product', 'productCategoryOptions'));
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $message = $this->productService->update($id, $validatedData);

        return redirect()->route('be.products.index')
            ->with('success', $message);
    }

    public function destroy(int $id)
    {
        $message = $this->productService->delete($id);

        return back()
            ->with('success', $message);
    }

    public function togglePublish(int $id)
    {
        $message = $this->productService->setPublishedStatus($id);

        return back()
            ->with('success', $message);
    }

    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xls,xlsx|max:2048',
            ]);
            $file = $request->file('file');
            $message = $this->productService->import($file);

            return back()
                ->with('success', $message);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                return back()
                    ->withErrors(['file' => $e->getMessage()]);
            }
            throw $e;
        }
    }

    public function export(Request $request)
    {
        // ambil flag dari query string, default false
        $isTemplate = $request->boolean('isTemplate', false);

        return $this->productService->export($isTemplate);
    }
}
