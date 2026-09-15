<?php

namespace App\Imports\Sheets;

use App\Repositories\ArticleRepository;
use App\Repositories\ArticleCategoryRepository;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class ArticlesByCategorySheet implements OnEachRow, WithHeadingRow
{
    protected int $articleCategoryId;
    protected ArticleRepository $articleRepo;
    protected ArticleCategoryRepository $articleCategoryRepo;

    public function __construct(int $articleCategoryId, ArticleRepository $articleRepo, ArticleCategoryRepository $articleCategoryRepo)
    {
        $this->articleCategoryId = $articleCategoryId;
        $this->articleRepo = $articleRepo;
        $this->articleCategoryRepo = $articleCategoryRepo;
    }

    public function onRow(Row $row): void
    {
        $data = $row->toArray();

        $this->articleRepo->updateOrCreate(
            [
                'title' => $data['title'],
                'article_category_id' => $this->articleCategoryId,
            ],
            [
                'content' => $data['content']
            ]
        );
    }
}
