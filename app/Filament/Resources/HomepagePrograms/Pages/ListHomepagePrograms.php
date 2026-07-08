<?php

namespace App\Filament\Resources\HomepagePrograms\Pages;

use App\Filament\Resources\HomepagePrograms\HomepageProgramResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomepagePrograms extends ListRecords
{
    protected static string $resource = HomepageProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
