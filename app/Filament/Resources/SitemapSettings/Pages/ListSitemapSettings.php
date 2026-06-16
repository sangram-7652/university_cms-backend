<?php

namespace App\Filament\Resources\SitemapSettings\Pages;

use App\Filament\Resources\SitemapSettings\SitemapSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSitemapSettings extends ListRecords
{
    protected static string $resource = SitemapSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
