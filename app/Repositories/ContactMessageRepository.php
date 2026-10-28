<?php

namespace App\Repositories;

use App\Models\ContactMessage;

class ContactMessageRepository
{
    protected ContactMessage $contactMessage;

    public function __construct(ContactMessage $contactMessage)
    {
        $this->contactMessage = $contactMessage;
    }

    public function getAll()
    {
        return $this->contactMessage->leftJoin('users', 'contact_messages.user_id', '=', 'users.id')
            ->select(
                'contact_messages.*',
                'users.name as user_name',
            )
            ->orderBy('is_read', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getDetail(int $id)
    {
        return $this->contactMessage->leftJoin('users', 'contact_messages.user_id', '=', 'users.id')
            ->select(
                'contact_messages.*',
                'users.name as user_name',
            )
            ->where('contact_messages.id', $id)
            ->firstOrFail();
    }

    public function getById(int $id)
    {
        return $this->contactMessage->findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }

    // public function create(array $data)
    // {
    //     return $this->contactMessage->create($data);
    // }

    // public function delete(int $id)
    // {
    //     return $this->getById($id)->delete();
    // }

    // public function getPageSlug()
    // {
    //     // return (new ContactMessage())->getTable();
    //     $page = ContactMessage::where('id', '5')->firstOrFail();
    //     return $page->slug;
    // }
}
