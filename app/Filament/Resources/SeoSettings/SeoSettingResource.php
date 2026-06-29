<?php

namespace App\Filament\Resources\SeoSettings;

use App\Filament\Resources\SeoSettings\Pages\EditSeoSetting;
use App\Filament\Resources\SeoSettings\Pages\ListSeoSettings;
use App\Filament\Resources\SeoSettings\Schemas\SeoSettingForm;
use App\Models\SeoSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;

class SeoSettingResource extends Resource
{
    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedCog6Tooth;

    protected static ?string $recordTitleAttribute = 'site_name';
    protected static bool $shouldRegisterNavigation = false;

    public static function getNavigationGroup(): ?string
    {
        return 'SEO Management';
    }

    public static function getNavigationLabel(): string
    {
        return 'Global SEO';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Schema $schema): Schema
    {
        return SeoSettingForm::configure($schema);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSeoSettings::route('/'),
            'edit' => EditSeoSetting::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_seo_setting') ?? false;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_seo_setting') ?? false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }
}
