<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Services\ProductCategoryService;

class ProductCategoryController extends Controller
{
    protected ProductCategoryService $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $productCategories = $this->productCategoryService->getCategories();

        return view('back-end.product-categories.index', compact('productCategories'));
    }

    public function create()
    {
        return view('back-end.product-categories.create');
    }

    public function store(StoreProductCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $message = $this->productCategoryService->create($validatedData);

        return back()
            ->with('success', $message);
    }

    public function show(int $id)
    {
        $productCategory = $this->productCategoryService->getCategoryDetail($id);

        return view('back-end.product-categories.show', compact('productCategory'));
    }

    public function edit(int $id)
    {
        $productCategory = $this->productCategoryService->getCategoryDetail($id);

        return view('back-end.product-categories.edit', compact('productCategory'));
    }

    public function update(UpdateProductCategoryRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $message = $this->productCategoryService->update($id, $validatedData);

        return redirect()->route('be.product-categories.index')
            ->with('success', $message);
    }

    public function destroy(int $id)
    {
        $message = $this->productCategoryService->delete($id);

        return back()
            ->with('success', $message);
    }

    public function updateActiveStatus(int $id)
    {
        $message = $this->productCategoryService->setActiveStatus($id);

        return back()
            ->with('success', $message);
    }
}
