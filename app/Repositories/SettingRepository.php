<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    protected Setting $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function getById(int $id)
    {
        return $this->setting->findOrFail($id);
    }

    public function getFirst()
    {
        return $this->setting->firstOrFail();
    }

    public function update(int $id, array $data)
    {
        return $this->getById($id)->update($data);
    }
}
