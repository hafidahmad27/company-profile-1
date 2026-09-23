<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    protected Company $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function getById(int $id)
    {
        return $this->company->findOrFail($id);
    }

    public function getFirst()
    {
        return $this->company->leftJoin('users', 'companies.user_id', '=', 'users.id')
            ->select(
                'companies.*',
                'users.email as user_email',
            )
            ->first() ?? new Company;
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }
}
