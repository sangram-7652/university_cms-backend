<?php

namespace App\Filament\Resources\HomepageFaqs\Pages;

use App\Filament\Resources\HomepageFaqs\HomepageFaqResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomepageFaqs extends ListRecords
{
    protected static string $resource = HomepageFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
