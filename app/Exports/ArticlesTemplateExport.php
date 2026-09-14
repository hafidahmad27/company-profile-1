<?php

namespace App\Exports;

use App\Repositories\ArticleCategoryRepository;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Export;
use Maatwebsite\Excel\Concerns\Exportable;

class ArticlesTemplateExport implements Export, WithMultipleSheets
{
    use Exportable;

    protected ArticleCategoryRepository $articleCategoryRepo;

    public function __construct(ArticleCategoryRepository $articleCategoryRepo)
    {
        $this->articleCategoryRepo = $articleCategoryRepo;
    }

    public function sheets(): array
    {
        $sheets = [];

        $articleCategories = $this->articleCategoryRepo->getAll();

        foreach ($articleCategories as $articleCategory) {
            $sheets[] = new ArticlesByCategoryExport($articleCategory->name);
        }

        return $sheets;
    }
}
