<?php

namespace App\Filament\Resources\HallTickets\Pages;

use App\Filament\Resources\HallTickets\HallTicketResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHallTickets extends ListRecords
{
    protected static string $resource = HallTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
