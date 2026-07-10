<?php

namespace App\Filament\Resources\LibraryPortals\Pages;

use App\Filament\Resources\LibraryPortals\LibraryPortalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLibraryPortals extends ListRecords
{
    protected static string $resource = LibraryPortalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
