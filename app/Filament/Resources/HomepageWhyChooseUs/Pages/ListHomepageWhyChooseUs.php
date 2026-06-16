<?php

namespace App\Filament\Resources\HomepageWhyChooseUs\Pages;

use App\Filament\Resources\HomepageWhyChooseUs\HomepageWhyChooseUsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomepageWhyChooseUs extends ListRecords
{
    protected static string $resource = HomepageWhyChooseUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
