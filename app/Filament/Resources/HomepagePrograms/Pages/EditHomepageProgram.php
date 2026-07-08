<?php

namespace App\Filament\Resources\HomepagePrograms\Pages;

use App\Filament\Resources\HomepagePrograms\HomepageProgramResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomepageProgram extends EditRecord
{
    protected static string $resource = HomepageProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
