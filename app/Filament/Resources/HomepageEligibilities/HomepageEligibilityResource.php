<?php

namespace App\Filament\Resources\HomepageEligibilities;

use App\Filament\Resources\HomepageEligibilities\Pages\CreateHomepageEligibility;
use App\Filament\Resources\HomepageEligibilities\Pages\EditHomepageEligibility;
use App\Filament\Resources\HomepageEligibilities\Pages\ListHomepageEligibilities;
use App\Filament\Resources\HomepageEligibilities\Schemas\HomepageEligibilityForm;
use App\Filament\Resources\HomepageEligibilities\Tables\HomepageEligibilitiesTable;
use App\Models\HomepageEligibility;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class HomepageEligibilityResource extends Resource
{
    protected static ?string $model = HomepageEligibility::class;

    protected static ?string $navigationLabel = 'Eligibility';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-check-badge';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Homepage Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) HomepageEligibility::count();
    }

    public static function form(Schema $schema): Schema
    {
        return HomepageEligibilityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomepageEligibilitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomepageEligibilities::route('/'),
            'create' => CreateHomepageEligibility::route('/create'),
            'edit' => EditHomepageEligibility::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_homepage_eligibility') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_homepage_eligibility') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_homepage_eligibility') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_homepage_eligibility') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_homepage_eligibility') ?? false;
    }
}
