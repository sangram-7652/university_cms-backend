<?php

namespace App\Filament\Resources\HallTickets;

use App\Filament\Resources\HallTickets\Pages\CreateHallTicket;
use App\Filament\Resources\HallTickets\Pages\EditHallTicket;
use App\Filament\Resources\HallTickets\Pages\ListHallTickets;
use App\Filament\Resources\HallTickets\Schemas\HallTicketForm;
use App\Filament\Resources\HallTickets\Tables\HallTicketsTable;
use App\Models\HallTicket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HallTicketResource extends Resource
{
    protected static ?string $model = HallTicket::class;

    protected static ?string $navigationLabel = 'Hall Ticket';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-ticket';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Student Zone';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) HallTicket::count();
    }

    public static function form(Schema $schema): Schema
    {
        return HallTicketForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HallTicketsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHallTickets::route('/'),
            'create' => CreateHallTicket::route('/create'),
            'edit' => EditHallTicket::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_hall_ticket') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_hall_ticket') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_hall_ticket') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_hall_ticket') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_hall_ticket') ?? false;
    }
}
