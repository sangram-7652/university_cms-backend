<?php

namespace App\Filament\Resources\RobotsSettings\Pages;

use App\Filament\Resources\RobotsSettings\RobotsSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRobotsSetting extends EditRecord
{
    protected static string $resource = RobotsSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
