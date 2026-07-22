<?php

namespace App\Filament\Resources\HomepageKeyHighlights\Pages;

use App\Filament\Resources\HomepageKeyHighlights\HomepageKeyHighlightResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomepageKeyHighlight extends EditRecord
{
    protected static string $resource = HomepageKeyHighlightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
