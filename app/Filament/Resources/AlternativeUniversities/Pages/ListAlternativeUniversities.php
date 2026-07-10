<?php

namespace App\Filament\Resources\AlternativeUniversities\Pages;

use App\Filament\Resources\AlternativeUniversities\AlternativeUniversityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAlternativeUniversities extends ListRecords
{
    protected static string $resource = AlternativeUniversityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
