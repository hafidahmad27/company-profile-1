<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    protected FileUploadService $fileUploadService;
    protected CompanyRepository $companyRepo;

    public function __construct(FileUploadService $fileUploadService, CompanyRepository $companyRepo)
    {
        $this->fileUploadService = $fileUploadService;
        $this->companyRepo = $companyRepo;
    }

    public function getCompany()
    {
        $company = $this->companyRepo->getFirst();

        return $company;
    }

    public function update(int $id, array $data)
    {
        $company = $this->companyRepo->getById($id);

        if (!empty($data['logo'])) {
            $data['logo'] = $this->fileUploadService->update(
                $data['logo'],
                $company->logo,
                'images',
                'public'
            );
        } else {
            $data['logo'] = $company->logo;
        }

        $this->companyRepo->update($id, $data);

        return 'Company updated successfully.';
    }
}
