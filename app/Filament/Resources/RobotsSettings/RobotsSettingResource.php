<?php

namespace App\Filament\Resources\RobotsSettings;

use App\Filament\Resources\RobotsSettings\Pages\CreateRobotsSetting;
use App\Filament\Resources\RobotsSettings\Pages\EditRobotsSetting;
use App\Filament\Resources\RobotsSettings\Pages\ListRobotsSettings;
use App\Filament\Resources\RobotsSettings\Schemas\RobotsSettingForm;
use App\Filament\Resources\RobotsSettings\Tables\RobotsSettingsTable;
use App\Models\RobotsSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class RobotsSettingResource extends Resource
{
    protected static ?string $model = RobotsSetting::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedShieldCheck;

    protected static ?string $recordTitleAttribute = 'id';

    public static function getNavigationGroup(): ?string
    {
        return 'SEO Management';
    }

    public static function getNavigationLabel(): string
    {
        return 'Robots Manager';
    }

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function form(Schema $schema): Schema
    {
        return RobotsSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RobotsSettingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRobotsSettings::route('/'),
            'create' => CreateRobotsSetting::route('/create'),
            'edit' => EditRobotsSetting::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_robots_setting') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_robots_setting') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_robots_setting') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_robots_setting') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_robots_setting') ?? false;
    }
}
