<?php

namespace App\Filament\Resources\HomepageAbouts;

use App\Filament\Resources\HomepageAbouts\Pages\CreateHomepageAbout;
use App\Filament\Resources\HomepageAbouts\Pages\EditHomepageAbout;
use App\Filament\Resources\HomepageAbouts\Pages\ListHomepageAbouts;
use App\Filament\Resources\HomepageAbouts\Schemas\HomepageAboutForm;
use App\Filament\Resources\HomepageAbouts\Tables\HomepageAboutsTable;
use App\Models\HomepageAbout;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class HomepageAboutResource extends Resource
{
    protected static ?string $model = HomepageAbout::class;

    protected static ?string $navigationLabel = 'About';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-information-circle';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Homepage Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) HomepageAbout::count();
    }

    public static function form(Schema $schema): Schema
    {
        return HomepageAboutForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomepageAboutsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomepageAbouts::route('/'),
            'create' => CreateHomepageAbout::route('/create'),
            'edit' => EditHomepageAbout::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_homepage_about') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_homepage_about') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_homepage_about') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_homepage_about') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_homepage_about') ?? false;
    }
}
