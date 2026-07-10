<?php

namespace App\Filament\Resources\AlternativeUniversities\Pages;

use App\Filament\Resources\AlternativeUniversities\AlternativeUniversityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAlternativeUniversity extends EditRecord
{
    protected static string $resource = AlternativeUniversityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
