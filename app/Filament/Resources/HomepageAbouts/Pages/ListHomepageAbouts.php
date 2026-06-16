<?php

namespace App\Filament\Resources\HomepageAbouts\Pages;

use App\Filament\Resources\HomepageAbouts\HomepageAboutResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomepageAbouts extends ListRecords
{
    protected static string $resource = HomepageAboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
