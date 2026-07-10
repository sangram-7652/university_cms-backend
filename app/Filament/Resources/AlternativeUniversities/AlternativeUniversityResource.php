<?php

namespace App\Filament\Resources\AlternativeUniversities;

use App\Filament\Resources\AlternativeUniversities\Pages\CreateAlternativeUniversity;
use App\Filament\Resources\AlternativeUniversities\Pages\EditAlternativeUniversity;
use App\Filament\Resources\AlternativeUniversities\Pages\ListAlternativeUniversities;
use App\Filament\Resources\AlternativeUniversities\Schemas\AlternativeUniversityForm;
use App\Filament\Resources\AlternativeUniversities\Tables\AlternativeUniversitiesTable;
use App\Models\AlternativeUniversity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;


class AlternativeUniversityResource extends Resource
{
    protected static ?string $model = AlternativeUniversity::class;

    protected static ?string $navigationLabel = 'Alternative Universities';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-building-office-2';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Student Zone';
    }

    public static function getNavigationSort(): ?int
    {
        return 7;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) AlternativeUniversity::count();
    }

    public static function form(Schema $schema): Schema
    {
        return AlternativeUniversityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AlternativeUniversitiesTable::configure($table);
    }




    public static function getPages(): array
    {
        return [
            'index' => ListAlternativeUniversities::route('/'),
            'create' => CreateAlternativeUniversity::route('/create'),
            'edit' => EditAlternativeUniversity::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_alternative_university') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_alternative_university') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_alternative_university') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_alternative_university') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_alternative_university') ?? false;
    }
}
