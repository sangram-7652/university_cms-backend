<?php

namespace App\Filament\Resources\LibraryPortals\Pages;

use App\Filament\Resources\LibraryPortals\LibraryPortalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLibraryPortal extends EditRecord
{
    protected static string $resource = LibraryPortalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
