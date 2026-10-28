<?php

namespace App\Services;

use App\Repositories\ContactMessageRepository;

class ContactMessageService
{
    protected ContactMessageRepository $contactMessageRepo;

    public function __construct(ContactMessageRepository $contactMessageRepo)
    {
        $this->contactMessageRepo = $contactMessageRepo;
    }

    public function getContactMessages()
    {
        $contactMessages = $this->contactMessageRepo->getAll();

        return $contactMessages;
    }

    public function getContactMessageDetail(int $id)
    {
        $contactMessage = $this->contactMessageRepo->getDetail($id);

        return $contactMessage;
    }

    public function markAsRead(int $id)
    {
        $this->contactMessageRepo->update($id, [
            'is_read' => 1
        ]);
    }
}
