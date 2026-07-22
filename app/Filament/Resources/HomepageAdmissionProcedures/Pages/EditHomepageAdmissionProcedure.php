<?php

namespace App\Filament\Resources\HomepageAdmissionProcedures\Pages;

use App\Filament\Resources\HomepageAdmissionProcedures\HomepageAdmissionProcedureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomepageAdmissionProcedure extends EditRecord
{
    protected static string $resource = HomepageAdmissionProcedureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
