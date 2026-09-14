<?php

namespace App\Imports;

use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use Maatwebsite\Excel\Concerns\Import;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ArticlesImport implements Import, WithMultipleSheets
{
    use Importable;

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
            $sheets[$articleCategory->name] = new ArticlesSheetImport($articleCategory->name, $this->articleRepo, $this->articleCategoryRepo);
        }

        return $sheets;
    }
}
