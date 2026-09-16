<?php

namespace App\Exports\Sheets;

use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
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

class ProductsByCategorySheet implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithColumnWidths, WithStyles
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
        return ['NAME', 'PRICE', 'DESCRIPTION'];
    }

    public function collection(): Enumerable
    {
        if ($this->isTemplate) {
            return collect([]);
        }

        return $this->productRepo->getByCategoryId($this->productCategoryId)
            ->map(fn($product) => [
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
            ]);
    }

    public function title(): string
    {
        $productCategory = $this->productCategoryRepo->getById($this->productCategoryId); // Nama sheet sesuai kategori product

        return $productCategory->name;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 45, // kolom name
            'B' => 15, // kolom price
            'C' => 100 // kolom description
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
