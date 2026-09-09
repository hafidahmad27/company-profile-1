<?php

namespace App\Repositories;

use App\Models\Section;

class SectionRepository
{
    protected Section $section;

    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function getAllById(int $pageId)
    {
        return $this->section->join('pages', 'sections.page_id', '=', 'pages.id')
            ->select(
                'pages.title as title_page',
                'sections.*',
            )
            ->where('page_id', $pageId)
            ->orderBy('order', 'desc')
            ->get();
    }

    // public function getActive()
    // {
    //     return $this->section->where('is_active', 1)->get();
    // }

    public function getById(int $id)
    {
        return $this->section->findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }
}
