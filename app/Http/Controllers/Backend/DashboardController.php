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
        $totalProduct = $this->productRepo->getTotalProduct();
        $totalProductBestSeller = $this->productRepo->getTotalProductBestSeller();
        $totalProductCategory = $this->productRepo->getTotalProductCategory();
        $totalProductCategoryBestSeller = $this->productRepo->getTotalProductCategoryBestSeller();

        $totalArticle = $this->articleRepo->getTotalArticle();
        $totalArticleCategory = $this->articleRepo->getTotalArticleCategory();
        // $totalArticleCategoryPopular = $this->articleRepo->getTotalArticleCategoryPopular();
        $totalArticleViews = $this->articleRepo->getTotalViews();

        $productTopBestSellers = $this->productRepo->getTopBestSellers();
        $articlePopular = $this->articleRepo->getArticlePopular();

        return view('back-end.dashboard', compact('totalProduct', 'totalProductBestSeller', 'totalProductCategory', 'totalProductCategoryBestSeller', 'totalArticle', 'totalArticleCategory', 'totalArticleViews', 'productTopBestSellers', 'articlePopular'));
    }
}
