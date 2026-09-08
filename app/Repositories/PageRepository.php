<?php

namespace App\Repositories;

use App\Models\Page;

class PageRepository
{
    protected Page $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function getAll()
    {
        return $this->page->orderBy('order', 'asc')->get();
    }

    public function getById(int $id)
    {
        return $this->page->findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }
}
