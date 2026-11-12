<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    public function __construct(
        protected FileUploadService $fileUploadService,
        protected CompanyRepository $companyRepo
    ) {}

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
    }
}
