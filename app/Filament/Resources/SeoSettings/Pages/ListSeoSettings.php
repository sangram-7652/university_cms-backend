<?php

namespace App\Filament\Resources\SeoSettings\Pages;

use App\Models\SeoSetting;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SeoSettings\SeoSettingResource;

class ListSeoSettings extends ListRecords
{
    protected static string $resource = SeoSettingResource::class;

    public function mount(): void
    {
        $record = SeoSetting::first();

        if (! $record) {
            $record = SeoSetting::create([
                'site_name' => config('app.name'),
            ]);
        }

        $this->redirect(
            SeoSettingResource::getUrl('edit', [
                'record' => $record,
            ])
        );
    }
}
