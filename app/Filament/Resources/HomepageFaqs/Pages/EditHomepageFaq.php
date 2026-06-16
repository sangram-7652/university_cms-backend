<?php

namespace App\Filament\Resources\HomepageFaqs\Pages;

use App\Filament\Resources\HomepageFaqs\HomepageFaqResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomepageFaq extends EditRecord
{
    protected static string $resource = HomepageFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
