<?php

namespace App\Filament\Resources\HomepageWhyChooseUs\Pages;

use App\Filament\Resources\HomepageWhyChooseUs\HomepageWhyChooseUsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomepageWhyChooseUs extends EditRecord
{
    protected static string $resource = HomepageWhyChooseUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
