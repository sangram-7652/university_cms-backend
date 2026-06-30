<?php

namespace App\Observers;

use App\Models\SchemaSetting;
use App\Models\University;

class UniversityObserver
{
    /**
     * Handle the University "created" event.
     */
    public function created(University $university): void
    {
        foreach (SchemaSetting::pageTypes() as $pageType => $label) {

            SchemaSetting::firstOrCreate(
                [
                    'university_id' => $university->id,
                    'page_type' => $pageType,
                ],
                [
                    'is_active' => true,
                ]
            );
        }
    }

    /**
     * Handle the University "updated" event.
     */
    public function updated(University $university): void
    {
        //
    }

    /**
     * Handle the University "deleted" event.
     */
    public function deleted(University $university): void
    {
        //
    }

    /**
     * Handle the University "restored" event.
     */
    public function restored(University $university): void
    {
        //
    }

    /**
     * Handle the University "force deleted" event.
     */
    public function forceDeleted(University $university): void
    {
        //
    }
}