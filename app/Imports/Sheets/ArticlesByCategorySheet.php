<?php

namespace App\Imports\Sheets;

use App\Services\ArticleService;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class ArticlesByCategorySheet implements OnEachRow, WithHeadingRow
{
    public function __construct(
        private int $articleCategoryId,
        private ArticleService $articleService
    ) {}

    public function onRow(Row $row): void
    {
        $this->articleService->updateOrCreate(
            $this->articleCategoryId,
            $row->toArray()
        );
    }
}
