<?php

namespace App\Imports;

use App\Repositories\ArticleRepository;
use App\Repositories\ArticleCategoryRepository;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Row;

class ArticlesSheetImport implements OnEachRow, WithTitle, WithHeadingRow
{
    protected string $articleCategoryName;
    protected ArticleRepository $articleRepo;
    protected ArticleCategoryRepository $articleCategoryRepo;

    public function __construct(string $articleCategoryName, ArticleRepository $articleRepo, ArticleCategoryRepository $articleCategoryRepo)
    {
        $this->articleCategoryName = $articleCategoryName;
        $this->articleRepo = $articleRepo;
        $this->articleCategoryRepo = $articleCategoryRepo;
    }

    public function onRow(Row $row): void
    {
        $data = $row->toArray();

        $articleCategoryId = $this->articleCategoryRepo->getIdByName($this->articleCategoryName);

        $this->articleRepo->updateOrCreate(
            [
                'title' => $data['title'],
                'article_category_id' => $articleCategoryId,
            ],
            [
                'content' => $data['content']
            ]
        );
    }

    public function title(): string
    {
        return $this->articleCategoryName;
    }
}
