<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('front-end.contact.index');
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
