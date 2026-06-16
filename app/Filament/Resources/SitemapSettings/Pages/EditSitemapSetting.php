<?php

namespace App\Filament\Resources\SitemapSettings\Pages;

use App\Filament\Resources\SitemapSettings\SitemapSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSitemapSetting extends EditRecord
{
    protected static string $resource = SitemapSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
