<?php

namespace App\Filament\Resources\SchemaTemplates\Pages;

use App\Filament\Resources\SchemaTemplates\SchemaTemplateResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSchemaTemplate extends EditRecord
{
    protected static string $resource = SchemaTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
