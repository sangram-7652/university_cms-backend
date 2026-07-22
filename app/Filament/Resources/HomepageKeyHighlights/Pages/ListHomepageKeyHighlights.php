<?php

namespace App\Filament\Resources\HomepageKeyHighlights\Pages;

use App\Filament\Resources\HomepageKeyHighlights\HomepageKeyHighlightResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomepageKeyHighlights extends ListRecords
{
    protected static string $resource = HomepageKeyHighlightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
