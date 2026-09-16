<?php

namespace App\Exports\Sheets;

use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Enumerable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ArticlesByCategorySheet implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithColumnWidths, WithStyles
{
    protected int $articleCategoryId;
    protected ArticleCategoryRepository $articleCategoryRepo;
    protected ArticleRepository $articleRepo;
    protected bool $isTemplate;

    public function __construct(int $articleCategoryId, ArticleCategoryRepository $articleCategoryRepo, ArticleRepository $articleRepo, bool $isTemplate = false)
    {
        $this->articleCategoryId = $articleCategoryId;
        $this->articleCategoryRepo = $articleCategoryRepo;
        $this->articleRepo = $articleRepo;
        $this->isTemplate = $isTemplate;
    }

    public function headings(): array
    {
        return ['TITLE', 'CONTENT'];
    }

    public function collection(): Enumerable
    {
        if ($this->isTemplate) {
            return collect([]);
        }

        return $this->articleRepo->getByCategoryId($this->articleCategoryId)
            ->map(fn($article) => [
                'title'   => $article->title,
                'content' => $article->content,
            ]);
    }

    public function title(): string
    {
        $articleCategory = $this->articleCategoryRepo->getById($this->articleCategoryId); // Nama sheet sesuai kategori artikel

        return $articleCategory->name;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 50, // kolom title
            'B' => 100 // kolom content
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [ // baris pertama (header)
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '6C757D'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }
}
