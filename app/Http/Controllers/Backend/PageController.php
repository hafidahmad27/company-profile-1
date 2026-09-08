<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePageRequest;
use App\Services\PageService;
use App\Services\SectionService;

class PageController extends Controller
{
    protected PageService $pageService;
    protected SectionService $sectionService;

    public function __construct(PageService $pageService, SectionService $sectionService)
    {
        $this->pageService = $pageService;
        $this->sectionService = $sectionService;
    }

    public function index()
    {
        $pages = $this->pageService->getPages();

        return view('back-end.pages.index', compact('pages'));
    }

    public function bulkUpdate(UpdatePageRequest $request)
    {
        $validatedData = $request->validated();
        $pagesData = $validatedData['pages'] ?? [];

        $message = $this->pageService->bulkUpdate($pagesData);

        return back()->with('success', $message);
    }
}
