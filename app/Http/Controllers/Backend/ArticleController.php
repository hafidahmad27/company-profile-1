<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Services\ArticleCategoryService;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected ArticleService $articleService;
    protected ArticleCategoryService $articleCategoryService;

    public function __construct(ArticleService $articleService, ArticleCategoryService $articleCategoryService)
    {
        $this->articleService = $articleService;
        $this->articleCategoryService = $articleCategoryService;
    }

    public function index()
    {
        $articles = $this->articleService->getArticles();

        return view('back-end.articles.index', compact('articles'));
    }

    public function create()
    {
        $articleCategoryOptions = $this->articleCategoryService->getCategoryOptions();

        return view('back-end.articles.create', compact('articleCategoryOptions'));
    }

    public function store(StoreArticleRequest $request)
    {
        $validatedData = $request->validated();
        $message = $this->articleService->create($validatedData);

        return redirect()->route('be.articles.index')
            ->with('success', $message);
    }

    public function show(int $id)
    {
        $article = $this->articleService->getArticleDetail($id);

        return view('back-end.articles.show', compact('article'));
    }

    public function edit(int $id)
    {
        $article = $this->articleService->getArticleDetail($id);
        $articleCategoryOptions = $this->articleCategoryService->getCategoryOptions();

        return view('back-end.articles.edit', compact('article', 'articleCategoryOptions'));
    }

    public function update(UpdateArticleRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $message = $this->articleService->update($id, $validatedData);

        return redirect()->route('be.articles.index')
            ->with('success', $message);
    }

    public function destroy(int $id)
    {
        $message = $this->articleService->delete($id);

        return back()
            ->with('success', $message);
    }

    public function togglePublish(int $id)
    {
        $message = $this->articleService->setPublishedStatus($id);

        return back()
            ->with('success', $message);
    }
}
