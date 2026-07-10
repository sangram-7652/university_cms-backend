<?php

namespace App\Filament\Resources\AssignmentStatuses;

use App\Filament\Resources\AssignmentStatuses\Pages\CreateAssignmentStatus;
use App\Filament\Resources\AssignmentStatuses\Pages\EditAssignmentStatus;
use App\Filament\Resources\AssignmentStatuses\Pages\ListAssignmentStatuses;
use App\Filament\Resources\AssignmentStatuses\Schemas\AssignmentStatusForm;
use App\Filament\Resources\AssignmentStatuses\Tables\AssignmentStatusesTable;
use App\Models\AssignmentStatus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AssignmentStatusResource extends Resource
{
    protected static ?string $model = AssignmentStatus::class;

    protected static ?string $navigationLabel = 'Assignment Status';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-clipboard-document-check';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Student Zone';
    }

    public static function getNavigationSort(): ?int
    {
        return 6;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) AssignmentStatus::count();
    }

    public static function form(Schema $schema): Schema
    {
        return AssignmentStatusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssignmentStatusesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAssignmentStatuses::route('/'),
            'create' => CreateAssignmentStatus::route('/create'),
            'edit' => EditAssignmentStatus::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_assignment_status') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_assignment_status') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_assignment_status') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_assignment_status') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_assignment_status') ?? false;
    }
}
