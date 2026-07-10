<?php

namespace App\Filament\Resources\Admissions;

use App\Filament\Resources\Admissions\Pages\CreateAdmission;
use App\Filament\Resources\Admissions\Pages\EditAdmission;
use App\Filament\Resources\Admissions\Pages\ListAdmissions;
use App\Filament\Resources\Admissions\Schemas\AdmissionForm;
use App\Filament\Resources\Admissions\Tables\AdmissionsTable;
use App\Models\Admission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AdmissionResource extends Resource
{
    protected static ?string $model = Admission::class;

    protected static ?string $navigationLabel = 'Admission';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-academic-cap';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Student Zone';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Admission::count();
    }

    public static function form(Schema $schema): Schema
    {
        return AdmissionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdmissionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAdmissions::route('/'),
            'create' => CreateAdmission::route('/create'),
            'edit' => EditAdmission::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_admission') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_admission') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_admission') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_admission') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_admission') ?? false;
    }
}
