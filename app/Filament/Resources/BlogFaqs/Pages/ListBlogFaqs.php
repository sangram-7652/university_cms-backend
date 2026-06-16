<?php

namespace App\Filament\Resources\BlogFaqs\Pages;

use App\Filament\Resources\BlogFaqs\BlogFaqResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBlogFaqs extends ListRecords
{
    protected static string $resource = BlogFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
