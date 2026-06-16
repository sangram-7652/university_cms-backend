<?php

namespace App\Filament\Resources\HomepageAbouts\Pages;

use App\Filament\Resources\HomepageAbouts\HomepageAboutResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomepageAbout extends EditRecord
{
    protected static string $resource = HomepageAboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
