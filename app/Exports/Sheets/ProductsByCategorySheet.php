<?php

namespace App\Exports\Sheets;

use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
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

class ProductsByCategorySheet implements FromCollection, WithHeadings, WithEvents, WithTitle, ShouldAutoSize, WithColumnWidths, WithStyles
{
    protected int $productCategoryId;
    protected ProductCategoryRepository $productCategoryRepo;
    protected ProductRepository $productRepo;
    protected bool $isTemplate;

    public function __construct(int $productCategoryId, ProductCategoryRepository $productCategoryRepo, ProductRepository $productRepo, bool $isTemplate = false)
    {
        $this->productCategoryId = $productCategoryId;
        $this->productCategoryRepo = $productCategoryRepo;
        $this->productRepo = $productRepo;
        $this->isTemplate = $isTemplate;
    }

    public function headings(): array
    {
        return ['ID', 'NAME', 'PRICE', 'DESCRIPTION'];
    }

    public function collection(): Enumerable
    {
        if ($this->isTemplate) {
            return collect([]);
        }

        return $this->productRepo->getByCategoryId($this->productCategoryId)
            ->map(fn($product) => [
                'id'            => $product->id,
                'name'          => $product->name,
                'price'         => $product->price,
                'description'   => $product->description,
            ]);
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

    public function title(): string
    {
        $productCategory = $this->productCategoryRepo->getById($this->productCategoryId); // Nama sheet sesuai kategori product

        return $productCategory->name;
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
}
