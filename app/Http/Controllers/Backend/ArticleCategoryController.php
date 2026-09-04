<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleCategoryRequest;
use App\Http\Requests\UpdateArticleCategoryRequest;
use App\Services\ArticleCategoryService;

class ArticleCategoryController extends Controller
{
    protected ArticleCategoryService $articleCategoryService;

    public function __construct(ArticleCategoryService $articleCategoryService)
    {
        $this->articleCategoryService = $articleCategoryService;
    }

    public function index()
    {
        $articleCategories = $this->articleCategoryService->getCategories();

        return view('back-end.article-categories.index', compact('articleCategories'));
    }

    public function create()
    {
        return view('back-end.article-categories.create');
    }

    public function store(StoreArticleCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $message = $this->articleCategoryService->create($validatedData);

        return back()
            ->with('success', $message);
    }

    public function show(int $id)
    {
        $articleCategory = $this->articleCategoryService->getCategoryDetail($id);

        return view('back-end.article-categories.show', compact('articleCategory'));
    }

    public function edit(int $id)
    {
        $articleCategory = $this->articleCategoryService->getCategoryDetail($id);

        return view('back-end.article-categories.edit', compact('articleCategory'));
    }

    public function update(UpdateArticleCategoryRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $message = $this->articleCategoryService->update($id, $validatedData);

        return redirect()->route('be.article-categories.index')
            ->with('success', $message);
    }

    public function destroy(int $id)
    {
        $message = $this->articleCategoryService->delete($id);

        return back()
            ->with('success', $message);
    }

    public function toggleActive(int $id)
    {
        $message = $this->articleCategoryService->setActiveStatus($id);

        return back()
            ->with('success', $message);
    }
}
