<?php

namespace App\Filament\Resources\HomepageAdmissionProcedures;

use App\Filament\Resources\HomepageAdmissionProcedures\Pages\CreateHomepageAdmissionProcedure;
use App\Filament\Resources\HomepageAdmissionProcedures\Pages\EditHomepageAdmissionProcedure;
use App\Filament\Resources\HomepageAdmissionProcedures\Pages\ListHomepageAdmissionProcedures;
use App\Filament\Resources\HomepageAdmissionProcedures\Schemas\HomepageAdmissionProcedureForm;
use App\Filament\Resources\HomepageAdmissionProcedures\Tables\HomepageAdmissionProceduresTable;
use App\Models\HomepageAdmissionProcedure;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomepageAdmissionProcedureResource extends Resource
{
    protected static ?string $model = HomepageAdmissionProcedure::class;

    protected static ?string $navigationLabel = 'Admission Procedure';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Homepage Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 6;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) HomepageAdmissionProcedure::count();
    }

    public static function form(Schema $schema): Schema
    {
        return HomepageAdmissionProcedureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomepageAdmissionProceduresTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomepageAdmissionProcedures::route('/'),
            'create' => CreateHomepageAdmissionProcedure::route('/create'),
            'edit' => EditHomepageAdmissionProcedure::route('/{record}/edit'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Permissions (RBAC)
    |--------------------------------------------------------------------------
    */

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_homepage_admission_procedure') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_homepage_admission_procedure') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_homepage_admission_procedure') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_homepage_admission_procedure') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_homepage_admission_procedure') ?? false;
    }
}
