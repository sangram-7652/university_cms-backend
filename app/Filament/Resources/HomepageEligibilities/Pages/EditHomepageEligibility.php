<?php

namespace App\Filament\Resources\HomepageEligibilities\Pages;

use App\Filament\Resources\HomepageEligibilities\HomepageEligibilityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomepageEligibility extends EditRecord
{
    protected static string $resource = HomepageEligibilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
