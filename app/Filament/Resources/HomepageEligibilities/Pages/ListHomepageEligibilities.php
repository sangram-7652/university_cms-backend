<?php

namespace App\Filament\Resources\HomepageEligibilities\Pages;

use App\Filament\Resources\HomepageEligibilities\HomepageEligibilityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomepageEligibilities extends ListRecords
{
    protected static string $resource = HomepageEligibilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
