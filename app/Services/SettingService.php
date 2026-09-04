<?php

namespace App\Services;

use App\Repositories\SettingRepository;

class SettingService
{
    protected FileUploadService $fileUploadService;
    protected SettingRepository $settingRepo;

    public function __construct(FileUploadService $fileUploadService, SettingRepository $settingRepo)
    {
        $this->fileUploadService = $fileUploadService;
        $this->settingRepo = $settingRepo;
    }

    public function getSetting()
    {
        $setting = $this->settingRepo->getFirst();

        return $setting;
    }

    public function update(int $id, array $data)
    {
        $setting = $this->settingRepo->getById($id);

        if (!empty($data['logo'])) {
            $data['logo'] = $this->fileUploadService->update(
                $data['logo'],
                $setting->logo,
                'images',
                'public'
            );
        } else {
            $data['logo'] = $setting->logo;
        }

        $this->settingRepo->update($id, $data);

        return 'Setting updated successfully.';
    }
}
