<?php

namespace App\Imports\Sheets;

use App\Repositories\ArticleRepository;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class ArticlesByCategorySheet implements OnEachRow, WithHeadingRow
{
    protected int $articleCategoryId;
    protected ArticleRepository $articleRepo;

    public function __construct(int $articleCategoryId, ArticleRepository $articleRepo)
    {
        $this->articleCategoryId = $articleCategoryId;
        $this->articleRepo = $articleRepo;
    }

    public function onRow(Row $row): void
    {
        $data = $row->toArray();

        $this->articleRepo->updateOrCreate(
            [
                'title' => $data['title'] ?? ('Untitled-' . uniqid()),
                'article_category_id' => $this->articleCategoryId,
            ],
            [
                'content' => $data['content']
            ]
        );
    }
}
