<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\ContactMessageService;

class ContactMessageController extends Controller
{
    public function __construct(
        protected ContactMessageService $contactMessageService
    ) {}

    public function index()
    {
        $contactMessages = $this->contactMessageService->getContactMessages();

        return view('back-end.contact-messages.index', compact('contactMessages'));
    }

    public function show(int $id)
    {
        $this->contactMessageService->markAsRead($id);
        $contactMessage = $this->contactMessageService->getContactMessageDetail($id);

        return view('back-end.contact-messages.show', compact('contactMessage'));
    }
}
