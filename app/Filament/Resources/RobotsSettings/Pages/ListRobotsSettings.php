<?php

namespace App\Filament\Resources\RobotsSettings\Pages;

use App\Filament\Resources\RobotsSettings\RobotsSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRobotsSettings extends ListRecords
{
    protected static string $resource = RobotsSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
