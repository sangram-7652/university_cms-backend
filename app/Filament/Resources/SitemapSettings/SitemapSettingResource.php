<?php

namespace App\Filament\Resources\SitemapSettings;

use App\Filament\Resources\SitemapSettings\Pages\CreateSitemapSetting;
use App\Filament\Resources\SitemapSettings\Pages\EditSitemapSetting;
use App\Filament\Resources\SitemapSettings\Pages\ListSitemapSettings;
use App\Filament\Resources\SitemapSettings\Schemas\SitemapSettingForm;
use App\Filament\Resources\SitemapSettings\Tables\SitemapSettingsTable;
use App\Models\SitemapSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class SitemapSettingResource extends Resource
{
    protected static ?string $model = SitemapSetting::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedGlobeAlt;

    protected static ?string $recordTitleAttribute = 'id';

    public static function getNavigationGroup(): ?string
    {
        return 'SEO Management';
    }

    public static function getNavigationLabel(): string
    {
        return 'Sitemap Settings';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function form(Schema $schema): Schema
    {
        return SitemapSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SitemapSettingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSitemapSettings::route('/'),
            'create' => CreateSitemapSetting::route('/create'),
            'edit' => EditSitemapSetting::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_sitemap_setting') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_sitemap_setting') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_sitemap_setting') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_sitemap_setting') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_sitemap_setting') ?? false;
    }
}
