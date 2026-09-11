<?php

namespace App\Observers;

use App\Models\Section;

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
        // menyamakan isi content about dengan about-preview. kalau yang diupdate adalah section_key 'about'
        if ($section->section_key === 'about' && $section->wasChanged('content')) {
            // cari record dengan section_key 'about-preview'
            $aboutPreview = Section::where('section_key', 'about-preview')->first();

            if ($aboutPreview) {
                $aboutPreview->update([
                    'content' => $section->content
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
