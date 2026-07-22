<?php

namespace App\Filament\Resources\HomepageKeyHighlights;

use App\Filament\Resources\HomepageKeyHighlights\Pages\CreateHomepageKeyHighlight;
use App\Filament\Resources\HomepageKeyHighlights\Pages\EditHomepageKeyHighlight;
use App\Filament\Resources\HomepageKeyHighlights\Pages\ListHomepageKeyHighlights;
use App\Filament\Resources\HomepageKeyHighlights\Schemas\HomepageKeyHighlightForm;
use App\Filament\Resources\HomepageKeyHighlights\Tables\HomepageKeyHighlightsTable;
use App\Models\HomepageKeyHighlight;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomepageKeyHighlightResource extends Resource
{
    protected static ?string $model = HomepageKeyHighlight::class;

    protected static ?string $navigationLabel = 'Key Highlights';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Homepage Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 5;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) HomepageKeyHighlight::count();
    }

    public static function form(Schema $schema): Schema
    {
        return HomepageKeyHighlightForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomepageKeyHighlightsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomepageKeyHighlights::route('/'),
            'create' => CreateHomepageKeyHighlight::route('/create'),
            'edit' => EditHomepageKeyHighlight::route('/{record}/edit'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Permissions (RBAC)
    |--------------------------------------------------------------------------
    */

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_homepage_key_highlight') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_homepage_key_highlight') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_homepage_key_highlight') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_homepage_key_highlight') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_homepage_key_highlight') ?? false;
    }
}
