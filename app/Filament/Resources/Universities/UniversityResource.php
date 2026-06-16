<?php

namespace App\Filament\Resources\Universities;

use App\Filament\Resources\Universities\Pages\CreateUniversity;
use App\Filament\Resources\Universities\Pages\EditUniversity;
use App\Filament\Resources\Universities\Pages\ListUniversities;
use App\Filament\Resources\Universities\Schemas\UniversityForm;
use App\Filament\Resources\Universities\Tables\UniversitiesTable;
use App\Models\University;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;


class UniversityResource extends Resource
{
    protected static ?string $model = University::class;

    protected static ?string $navigationLabel = 'Universities';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-building-library';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'University Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) University::count();
    }

    public static function form(Schema $schema): Schema
    {
        return UniversityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UniversitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUniversities::route('/'),
            'create' => CreateUniversity::route('/create'),
            'edit' => EditUniversity::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_university') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_university') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_university') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_university') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_university') ?? false;
    }
}
