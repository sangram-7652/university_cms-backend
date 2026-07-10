<?php

namespace App\Filament\Resources\AssignmentStatuses\Pages;

use App\Filament\Resources\AssignmentStatuses\AssignmentStatusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAssignmentStatuses extends ListRecords
{
    protected static string $resource = AssignmentStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
