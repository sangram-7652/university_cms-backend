<?php


namespace App\Filament\Resources\SeoSettings\Pages;


use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SeoSettings\SeoSettingResource;
use Filament\Actions\CreateAction;

class ListSeoSettings extends ListRecords
{
    protected static string $resource = SeoSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
