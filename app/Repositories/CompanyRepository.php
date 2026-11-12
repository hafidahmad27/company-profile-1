<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function __construct(
        protected Company $company
    ) {}

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
            ->firstOrFail();
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }
}
