<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Services\SettingService;

class SettingController extends Controller
{
    protected SettingService $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        $setting = $this->settingService->getSetting();

        return view('back-end.settings.index', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $message = $this->settingService->update($id, $validatedData);

        return back()
            ->with('success', $message);
    }
}
