<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Services\PageService;

class PageController extends Controller
{
    protected PageService $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function index()
    {
        $pages = $this->pageService->getPages();

        return view('back-end.pages.index', compact('pages'));
    }

    public function show(int $pageId)
    {
        $page = $this->pageService->getTitlePage($pageId);
        $sections = $this->pageService->getSections($pageId);

        return view('back-end.pages.show', compact('page', 'sections'));
    }

    public function bulkUpdate(UpdatePageRequest $request)
    {
        $validatedData = $request->validated();
        $pagesData = $validatedData['pages'] ?? [];

        $message = $this->pageService->bulkUpdate($pagesData);

        return back()->with('success', $message);
    }

    public function bulkUpdateSection(UpdateSectionRequest $request)
    {
        $validatedData = $request->validated();
        $sectionsData = $validatedData['sections'] ?? [];

        $message = $this->pageService->bulkUpdateSection($sectionsData);

        return back()->with('success', $message);
    }
}
