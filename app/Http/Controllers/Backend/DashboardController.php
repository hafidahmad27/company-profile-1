<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\ProductRepository;

class DashboardController extends Controller
{
    protected ProductRepository $productRepo;
    protected ArticleRepository $articleRepo;

    public function __construct(ProductRepository $productRepo, ArticleRepository $articleRepo)
    {
        $this->productRepo = $productRepo;
        $this->articleRepo = $articleRepo;
    }

    public function index()
    {
        $totalProduct = $this->productRepo->getTotalProductByStatus(1);
        $totalProductBestSeller = $this->productRepo->getTotalProductBestSeller();
        $productTopBestSellers = $this->productRepo->getTopBestSellers();
        $totalProductCategory = $this->productRepo->getTotalProductCategory();
        // $totalProductCategoryBestSeller = $this->productRepo->getTotalProductCategoryBestSeller();
        $totalProductDraft = $this->productRepo->getTotalProductByStatus(0);

        $totalArticle = $this->articleRepo->getTotalArticleByStatus(1);
        $articlePopular = $this->articleRepo->getArticlePopular(5);
        $totalArticleCategory = $this->articleRepo->getTotalArticleCategory();
        // $totalArticleCategoryPopular = $this->articleRepo->getTotalArticleCategoryPopular();
        // $totalArticleViews = $this->articleRepo->getTotalViews();
        $totalArticleDraft = $this->articleRepo->getTotalArticleByStatus(0);

        // Pie Chart
        $productByCategory = $this->productRepo->getProductByCategory();
        $articleByCategory = $this->articleRepo->getArticleByCategory();

        // Bar Chart
        // $articleViewsPerMonth = $this->articleRepo->getArticleViewsPerMonth();

        // $articleViewLabels = $articleViewsPerMonth
        //     ->pluck('month_name')
        //     ->unique()
        //     ->values();

        // $articleViewDatasets = [];

        // $categories = $articleViewsPerMonth
        //     ->pluck('category_name')
        //     ->unique();

        // foreach ($categories as $category) {
        //     $data = [];

        //     foreach ($articleViewLabels as $month) {
        //         $data[] = $articleViewsPerMonth
        //             ->where('month_name', $month)
        //             ->where('category_name', $category)
        //             ->sum('total');
        //     }

        //     $articleViewDatasets[] = [
        //         'label' => $category,
        //         'data' => $data,
        //     ];
        // }

        return view('back-end.dashboard', compact(
            'totalProduct',
            'totalProductBestSeller',
            'productTopBestSellers',
            'totalProductCategory',
            // 'totalProductCategoryBestSeller',
            'totalProductDraft',
            'totalArticle',
            'articlePopular',
            'totalArticleCategory',
            // 'totalArticleCategoryPopular'
            // 'totalArticleViews',
            'totalArticleDraft',
            'productByCategory',
            'articleByCategory',
            // 'articleViewLabels',
            // 'articleViewDatasets'
        ));
    }
}
