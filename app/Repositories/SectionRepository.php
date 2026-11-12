<?php

namespace App\Repositories;

use App\Models\Section;

class SectionRepository
{
    public function __construct(
        protected Section $section
    ) {}

    public function getAllByPageId(int $pageId)
    {
        return $this->section->where('page_id', $pageId)
            ->orderBy('id', 'asc')
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
