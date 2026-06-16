<?php

namespace App\Filament\Resources\Specializations;

use App\Filament\Resources\Specializations\Pages\CreateSpecialization;
use App\Filament\Resources\Specializations\Pages\EditSpecialization;
use App\Filament\Resources\Specializations\Pages\ListSpecializations;
use App\Filament\Resources\Specializations\Schemas\SpecializationForm;
use App\Filament\Resources\Specializations\Tables\SpecializationsTable;
use App\Models\Specialization;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;


class SpecializationResource extends Resource
{
    protected static ?string $model = Specialization::class;

    protected static ?string $navigationLabel = 'Specializations';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-academic-cap';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'Academic Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Specialization::count();
    }

    public static function form(Schema $schema): Schema
    {
        return SpecializationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpecializationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSpecializations::route('/'),
            'create' => CreateSpecialization::route('/create'),
            'edit' => EditSpecialization::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()->can('view_specialization');
    }

    public static function canCreate(): bool
    {
        return auth()->check()
            && auth()->user()->can('create_specialization');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->check()
            && auth()->user()->can('edit_specialization');
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->check()
            && auth()->user()->can('delete_specialization');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check()
            && auth()->user()->can('delete_specialization');
    }
}
