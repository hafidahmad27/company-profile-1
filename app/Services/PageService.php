<?php

namespace App\Services;

use App\Repositories\PageRepository;

class PageService
{
    protected PageRepository $pageRepo;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepo = $pageRepo;
    }

    public function getPages()
    {
        return $this->pageRepo->getAll();
    }

    public function getTitlePage(int $id)
    {
        return $this->pageRepo->getById($id);
    }

    // public function getPageOptions()
    // {
    //     return $this->pageRepo->getActive();
    // }

    public function bulkUpdate(array $data)
    {
        foreach ($data as $id => $item) {
            $this->pageRepo->update($id, [
                'title' => $item['title'],
                'order' => $item['order'],
                'is_active' => !empty($item['is_active']) ? 1 : 0
            ]);
        }

        return 'Pages updated successfully.';
    }
}
