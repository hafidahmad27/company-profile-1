<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Section;

class AboutController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'about')->where('is_active', 1)->firstOrFail();
        $section = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('pages.slug', 'about')
            ->where('sections.is_active', 1)
            ->firstOrFail();

        return view('front-end.about.index', compact('page', 'section'));
    }
}
