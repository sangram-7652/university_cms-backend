<?php

namespace App\Filament\Resources\HomepageAdmissionProcedures\Pages;

use App\Filament\Resources\HomepageAdmissionProcedures\HomepageAdmissionProcedureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomepageAdmissionProcedures extends ListRecords
{
    protected static string $resource = HomepageAdmissionProcedureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
