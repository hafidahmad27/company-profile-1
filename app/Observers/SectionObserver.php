<?php

namespace App\Observers;

use App\Models\Section;
use App\Models\Company;
use Illuminate\Support\Str;

class SectionObserver
{
    /**
     * Handle the Section "created" event.
     */
    public function created(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "updated" event.
     */
    public function updated(Section $section): void
    {
        // menyamakan isi beberapa field mengambil dari 'content' about kalau yang diupdate adalah section_key 'about'
        if ($section->section_key === 'about' && $section->wasChanged('content')) {
            $aboutPreview = Section::where('section_key', 'about-preview')->first();
            $company = Company::first();

            if ($aboutPreview && $aboutPreview->content == null) {
                $aboutPreview->update([
                    'content' => $section->content
                ]);
            }
            if ($company && $company->footer_about == null) {
                $company->update([
                    'footer_about' => Str::limit($section->content, 170, '')
                ]);
            }
        }
    }

    /**
     * Handle the Section "deleted" event.
     */
    public function deleted(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "restored" event.
     */
    public function restored(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "force deleted" event.
     */
    public function forceDeleted(Section $section): void
    {
        //
    }
}
