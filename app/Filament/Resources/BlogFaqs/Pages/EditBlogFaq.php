<?php

namespace App\Filament\Resources\BlogFaqs\Pages;

use App\Filament\Resources\BlogFaqs\BlogFaqResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBlogFaq extends EditRecord
{
    protected static string $resource = BlogFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
