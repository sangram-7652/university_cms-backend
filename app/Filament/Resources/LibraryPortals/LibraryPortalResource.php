<?php

namespace App\Filament\Resources\LibraryPortals;

use App\Filament\Resources\LibraryPortals\Pages\CreateLibraryPortal;
use App\Filament\Resources\LibraryPortals\Pages\EditLibraryPortal;
use App\Filament\Resources\LibraryPortals\Pages\ListLibraryPortals;
use App\Filament\Resources\LibraryPortals\Schemas\LibraryPortalForm;
use App\Filament\Resources\LibraryPortals\Tables\LibraryPortalsTable;
use App\Models\LibraryPortal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class LibraryPortalResource extends Resource
{
    protected static ?string $model = LibraryPortal::class;

    protected static ?string $navigationLabel = 'Library Portal';

    protected static string|BackedEnum|null $navigationIcon =
        'heroicon-o-building-library';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Student Zone';
    }

    public static function getNavigationSort(): ?int
    {
        return 5;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) LibraryPortal::count();
    }

    public static function form(Schema $schema): Schema
    {
        return LibraryPortalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LibraryPortalsTable::configure($table);
    }

  

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLibraryPortals::route('/'),
            'create' => CreateLibraryPortal::route('/create'),
            'edit' => EditLibraryPortal::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_library_portal') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_library_portal') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_library_portal') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_library_portal') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_library_portal') ?? false;
    }
}