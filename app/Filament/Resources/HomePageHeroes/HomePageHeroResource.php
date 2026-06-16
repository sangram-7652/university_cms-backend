<?php

namespace App\Filament\Resources\HomePageHeroes;

use App\Filament\Resources\HomePageHeroes\Pages\CreateHomePageHero;
use App\Filament\Resources\HomePageHeroes\Pages\EditHomePageHero;
use App\Filament\Resources\HomePageHeroes\Pages\ListHomePageHeroes;
use App\Filament\Resources\HomePageHeroes\Schemas\HomePageHeroForm;
use App\Filament\Resources\HomePageHeroes\Tables\HomePageHeroesTable;
use App\Models\HomePageHero;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class HomePageHeroResource extends Resource
{
    protected static ?string $model = HomePageHero::class;

    protected static ?string $navigationLabel = 'Hero';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-home';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Homepage Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) HomePageHero::count();
    }

    public static function form(Schema $schema): Schema
    {
        return HomePageHeroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomePageHeroesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomePageHeroes::route('/'),
            'create' => CreateHomePageHero::route('/create'),
            'edit' => EditHomePageHero::route('/{record}/edit'),
        ];
    }
    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_homepage_hero') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_homepage_hero') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_homepage_hero') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_homepage_hero') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_homepage_hero') ?? false;
    }
}
