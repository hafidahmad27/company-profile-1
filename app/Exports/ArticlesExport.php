<?php

namespace App\Exports;

use App\Exports\Sheets\ArticlesByCategorySheet;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use Maatwebsite\Excel\Concerns\Export;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ArticlesExport implements Export, WithMultipleSheets
{
    use Exportable;

    protected ArticleRepository $articleRepo;
    protected ArticleCategoryRepository $articleCategoryRepo;
    protected bool $isTemplate;

    public function __construct(ArticleRepository $articleRepo, ArticleCategoryRepository $articleCategoryRepo, bool $isTemplate = false)
    {
        $this->articleRepo = $articleRepo;
        $this->articleCategoryRepo = $articleCategoryRepo;
        $this->isTemplate = $isTemplate;
    }

    public function sheets(): array
    {
        $sheets = [];
        $articleCategories = $this->articleCategoryRepo->getAll();

        foreach ($articleCategories as $articleCategory) {
            $sheets[$articleCategory->name] = new ArticlesByCategorySheet(
                $articleCategory->id,
                $this->articleCategoryRepo,
                $this->articleRepo,
                $this->isTemplate
            );
        }

        return $sheets;
    }
}
