<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCompanyRequest;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    protected CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $company = $this->companyService->getCompany();

        return view('back-end.companies.index', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $message = $this->companyService->update($id, $validatedData);

        return back()
            ->with('success', $message);
    }
}
