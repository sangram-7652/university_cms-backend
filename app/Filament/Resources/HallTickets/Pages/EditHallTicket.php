<?php

namespace App\Filament\Resources\HallTickets\Pages;

use App\Filament\Resources\HallTickets\HallTicketResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHallTicket extends EditRecord
{
    protected static string $resource = HallTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
