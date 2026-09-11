<?php

namespace App\Services;

use App\Repositories\PageRepository;
use App\Repositories\SectionRepository;
use App\Traits\GenerateUploadPathTrait;

class PageService
{
    use GenerateUploadPathTrait;

    protected FileUploadService $fileUploadService;
    protected PageRepository $pageRepo;
    protected SectionRepository $sectionRepo;

    public function __construct(FileUploadService $fileUploadService, PageRepository $pageRepo, SectionRepository $sectionRepo)
    {
        $this->fileUploadService = $fileUploadService;
        $this->pageRepo = $pageRepo;
        $this->sectionRepo = $sectionRepo;
    }

    public function getPages()
    {
        return $this->pageRepo->getAll();
    }

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

    public function getTitlePage(int $id)
    {
        $page = $this->pageRepo->getById($id);

        return $page->title;
    }

    public function getSections(int $pageId)
    {
        return $this->sectionRepo->getAllById($pageId);
    }

    public function bulkUpdateSection(array $data)
    {
        $sectionKey = null;

        foreach ($data as $id => $item) {
            $section = $this->sectionRepo->getById($id);
            $oldPath = $section->image;

            // simpan section_key dari loop pertama
            if ($sectionKey === null) {
                $sectionKey = $section->section_key;
            }

            // generate path sesuai section_key
            $uploadPath = $this->generateUploadPath(
                $section->section_key
            );
            // cek apakah ada file baru
            if (!empty($item['image'])) {
                // upload file baru, hapus file lama
                $item['image'] = $this->fileUploadService->update(
                    $item['image'],
                    $oldPath,
                    $uploadPath,
                    'public'
                );
            } else {
                if (!empty($oldPath)) {
                    // jika tidak ada file baru tapi folder berubah → pindahkan file lama
                    $newPath = $uploadPath . '/' . basename($oldPath);
                    $this->fileUploadService->move($oldPath, $newPath, 'public');
                    $item['image'] = $newPath;
                } else {
                    // kalau memang tidak ada file lama
                    $item['image'] = null;
                }
            }

            $this->sectionRepo->update($id, [
                'title'        => $item['title'] ?? null,
                'subtitle'     => $item['subtitle'] ?? null,
                'content'      => $item['content'] ?? null,
                'image'        => $item['image'] ?? null,
                'button_text'  => $item['button_text'] ?? null,
                'button_link'  => $item['button_link'] ?? null,
                'order'        => $item['order'] ?? null,
                'is_active'    => !empty($item['is_active']) ? 1 : 0,
            ]);
        }

        // return pesan dengan judul section
        $title = $sectionKey ? ucwords(str_replace('-', ' ', $sectionKey)) : 'Section';
        return $title . ' updated successfully.';
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
