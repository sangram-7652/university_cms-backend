<?php

namespace App\Filament\Resources\HomepageWhyChooseUs;

use App\Filament\Resources\HomepageWhyChooseUs\Pages\CreateHomepageWhyChooseUs;
use App\Filament\Resources\HomepageWhyChooseUs\Pages\EditHomepageWhyChooseUs;
use App\Filament\Resources\HomepageWhyChooseUs\Pages\ListHomepageWhyChooseUs;
use App\Filament\Resources\HomepageWhyChooseUs\Schemas\HomepageWhyChooseUsForm;
use App\Filament\Resources\HomepageWhyChooseUs\Tables\HomepageWhyChooseUsTable;
use App\Models\HomepageWhyChooseUs;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomepageWhyChooseUsResource extends Resource
{
    protected static ?string $model = HomepageWhyChooseUs::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-hand-thumb-up';

    protected static ?string $navigationLabel = 'Why Choose Us';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Homepage Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) HomepageWhyChooseUs::count();
    }

    public static function form(Schema $schema): Schema
    {
        return HomepageWhyChooseUsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomepageWhyChooseUsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomepageWhyChooseUs::route('/'),
            'create' => CreateHomepageWhyChooseUs::route('/create'),
            'edit' => EditHomepageWhyChooseUs::route('/{record}/edit'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Permissions (RBAC)
    |--------------------------------------------------------------------------
    */

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_homepage_why_choose_us') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_homepage_why_choose_us') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_homepage_why_choose_us') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_homepage_why_choose_us') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_homepage_why_choose_us') ?? false;
    }
}
