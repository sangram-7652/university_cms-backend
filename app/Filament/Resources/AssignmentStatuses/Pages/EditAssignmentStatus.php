<?php

namespace App\Filament\Resources\AssignmentStatuses\Pages;

use App\Filament\Resources\AssignmentStatuses\AssignmentStatusResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAssignmentStatus extends EditRecord
{
    protected static string $resource = AssignmentStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
