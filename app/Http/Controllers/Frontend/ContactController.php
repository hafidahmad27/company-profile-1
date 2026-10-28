<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use App\Models\Page;
use App\Models\Section;

class ContactController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'contact')->where('is_active', 1)->firstOrFail();
        $section = Section::join('pages', 'sections.page_id', '=', 'pages.id')
            ->where('pages.slug', 'contact')
            ->where('sections.is_active', 1)
            ->firstOrFail();

        return view('front-end.contact.index', compact('page', 'section'));
    }

    public function store(StoreContactMessageRequest $request)
    {
        $validatedData = $request->validated();
        ContactMessage::create($validatedData);

        return back()
            ->with('success', 'Your message has been sent successfully!');
    }

    // public function edit(int $id)
    // {
    //     //
    // }

    // public function update(UpdateContactMessageRequest $request, int $id)
    // {
    //     //
    // }

    // public function destroy(int $id)
    // {
    //     //
    // }
}
