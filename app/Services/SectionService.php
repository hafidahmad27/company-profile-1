<?php

namespace App\Services;

use App\Repositories\SectionRepository;

class SectionService
{
    protected SectionRepository $sectionRepo;

    public function __construct(SectionRepository $sectionRepo)
    {
        $this->sectionRepo = $sectionRepo;
    }

    public function getSections(int $pageId)
    {
        return $this->sectionRepo->getAllById($pageId);
    }

    public function update(int $id, array $data)
    {
        $this->sectionRepo->update($id, $data);

        return 'Section updated successfully.';
    }

    public function setActiveStatus(int $id)
    {
        $section = $this->sectionRepo->getById($id);
        $isActive = $section->is_active ? 0 : 1;

        $this->sectionRepo->update($id, [
            'is_active' => $isActive
        ]);

        return $isActive
            ? 'Section berhasil diaktifkan.'
            : 'Section berhasil dinonaktifkan.';
    }
}
