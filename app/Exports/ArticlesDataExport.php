<?php

namespace App\Exports;

use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use Maatwebsite\Excel\Concerns\Export;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ArticlesDataExport implements Export, WithMultipleSheets
{
    use Exportable;

    protected ArticleRepository $articleRepo;
    protected ArticleCategoryRepository $articleCategoryRepo;

    public function __construct(ArticleRepository $articleRepo, ArticleCategoryRepository $articleCategoryRepo)
    {
        $this->articleRepo = $articleRepo;
        $this->articleCategoryRepo = $articleCategoryRepo;
    }

    public function sheets(): array
    {
        $sheets = [];

        $articleCategories = $this->articleCategoryRepo->getAll();

        foreach ($articleCategories as $articleCategory) {
            $sheets[$articleCategory->name] = new ArticlesByCategoryDataExport(
                $articleCategory->id,
                $this->articleCategoryRepo,
                $this->articleRepo,
            );
        }

        return $sheets;
    }
}
