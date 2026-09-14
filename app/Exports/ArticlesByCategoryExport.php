<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Export;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ArticlesByCategoryExport implements Export, WithHeadings, WithTitle, ShouldAutoSize, WithColumnWidths, WithStyles
{
    use Exportable;

    protected string $articleCategory;

    public function __construct(string $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }

    public function headings(): array
    {
        return ['TITLE', 'CONTENT'];
    }

    public function title(): string
    {
        return $this->articleCategory; // Nama sheet sesuai kategori artikel
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
