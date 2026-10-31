<?php

namespace App\Imports;

use App\Imports\Sheets\ArticlesByCategorySheet;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Concerns\Import;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ArticlesImport implements Import, WithMultipleSheets
{
    protected ArticleRepository $articleRepo;
    protected ArticleCategoryRepository $articleCategoryRepo;
    protected Spreadsheet $spreadsheet;

    public function __construct(ArticleRepository $articleRepo, ArticleCategoryRepository $articleCategoryRepo, UploadedFile $file)
    {
        $this->articleRepo = $articleRepo;
        $this->articleCategoryRepo = $articleCategoryRepo;
        $this->spreadsheet = IOFactory::load($file->getRealPath());
    }

    public function sheets(): array
    {
        $sheets = [];
        $articleCategories = $this->articleCategoryRepo->getAll();

        foreach ($articleCategories as $articleCategory) {
            $worksheet = $this->spreadsheet->getSheetByName($articleCategory->name);

            // skip kalau row kosong atau hanya ada header
            if ($worksheet && $worksheet->getHighestRow() > 1) {
                $sheets[$articleCategory->name] = new ArticlesByCategorySheet(
                    $articleCategory->id,
                    $this->articleRepo
                );
            }
        }

        return $sheets;
    }
}
