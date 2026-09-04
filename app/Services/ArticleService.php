<?php

namespace App\Services;

use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use App\Traits\GenerateUploadPathTrait;

class ArticleService
{
    use GenerateUploadPathTrait;

    protected FileUploadService $fileUploadService;
    protected ArticleRepository $articleRepo;
    protected ArticleCategoryRepository $articleCategoryRepo;

    public function __construct(FileUploadService $fileUploadService, ArticleRepository $articleRepo, ArticleCategoryRepository $articleCategoryRepo)
    {
        $this->fileUploadService = $fileUploadService;
        $this->articleRepo = $articleRepo;
        $this->articleCategoryRepo = $articleCategoryRepo;
    }

    public function getArticles()
    {
        $articles = $this->articleRepo->getAll();

        return $articles;
    }

    public function getArticleDetail(int $id)
    {
        $article = $this->articleRepo->getDetail($id);

        return $article;
    }

    public function create(array $data)
    {
        $articleCategory = $this->articleCategoryRepo->getById($data['article_category_id']);

        // cek apakah ada file baru
        if (!empty($data['image'])) {
            // generate path sesuai tabel + slug kategori
            $uploadPath = $this->generateUploadPath(
                $this->articleRepo->getPageName(),
                $articleCategory->slug
            );
            // upload file ke storage
            $data['image'] = $this->fileUploadService->upload(
                $data['image'],
                $uploadPath,
                'public'
            );
        }

        $this->articleRepo->create($data);

        return 'Article created successfully.';
    }

    public function update(int $id, array $data)
    {
        $article = $this->articleRepo->getById($id);
        $articleCategory = $this->articleCategoryRepo->getById($data['article_category_id']);
        $oldPath = $article->image;

        // generate path sesuai tabel + slug kategori
        $uploadPath = $this->generateUploadPath(
            $this->articleRepo->getPageName(),
            $articleCategory->slug
        );
        // cek apakah ada file baru
        if (!empty($data['image'])) {
            // upload file ke storage
            $data['image'] = $this->fileUploadService->update(
                $data['image'],
                $oldPath,
                $uploadPath,
                'public'
            );
        } else {
            if (!empty($oldPath)) {
                // jika tidak ada file yg di-upload dan jika kategori diubah, maka file lama berpindah folder menyesuaikan kategori saat ini
                $newPath = $uploadPath . '/' . basename($oldPath);
                $this->fileUploadService->move($oldPath, $newPath, 'public');
                $data['image'] = $newPath;
            } else {
                // jika memang tidak ada file lama, maka tidak perlu panggil method move() dan cukup set null.
                $data['image'] = null;
            }
        }

        $this->articleRepo->update($id, $data);

        return 'Article updated successfully.';
    }

    public function delete(int $id)
    {
        $article = $this->articleRepo->getById($id);

        $this->articleRepo->delete($id);

        if ($article->image) {
            $this->fileUploadService->delete($article->image, 'public');
        }

        return 'Article deleted successfully.';
    }

    public function setPublishedStatus(int $id)
    {
        $article = $this->articleRepo->getById($id);

        $isPublished = $article->is_published ? 0 : 1;
        $this->articleRepo->update($id,  [
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
        ]);

        return $isPublished
            ? 'Artikel berhasil dipublikasikan.'
            : 'Artikel berhasil disembunyikan.';
    }
}
