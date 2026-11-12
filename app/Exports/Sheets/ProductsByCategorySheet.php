<?php

namespace App\Exports\Sheets;

use Illuminate\Support\Collection;
use Illuminate\Support\Enumerable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsByCategorySheet implements FromCollection, WithHeadings, WithTitle, WithColumnWidths, ShouldAutoSize, WithStyles, WithEvents
{
    public function __construct(
        private string $title,
        private Collection $data
    ) {}

    public function headings(): array
    {
        return ['ID', 'NAME', 'PRICE', 'DESCRIPTION'];
    }

    public function collection(): Enumerable
    {
        return $this->data;
    }

    public function title(): string
    {
        return $this->title; // Nama sheet sesuai kategori product
    }

    public function columnWidths(): array
    {
        return [
            'B' => 45, // kolom name
            'C' => 15, // kolom price
            'D' => 100 // kolom description
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

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Hide kolom A (ID)
                $event->sheet->getDelegate()
                    ->getColumnDimension('A') // Kolom A = id
                    ->setVisible(false);

                // Unlock semua cell dulu
                $event->sheet->getDelegate()
                    ->getStyle('A:Z')
                    ->getProtection()
                    ->setLocked(Protection::PROTECTION_UNPROTECTED);

                // Lock kolom A (ID)
                $event->sheet->getDelegate()
                    ->getStyle('A:A')
                    ->getProtection()
                    ->setLocked(Protection::PROTECTION_PROTECTED);

                // Aktifkan proteksi sheet
                $event->sheet->getDelegate()
                    ->getProtection()
                    ->setSheet(true);
            },
        ];
    }
}
