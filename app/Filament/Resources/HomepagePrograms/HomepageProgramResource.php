<?php

namespace App\Filament\Resources\HomepagePrograms;

use App\Filament\Resources\HomepagePrograms\Pages\CreateHomepageProgram;
use App\Filament\Resources\HomepagePrograms\Pages\EditHomepageProgram;
use App\Filament\Resources\HomepagePrograms\Pages\ListHomepagePrograms;
use App\Filament\Resources\HomepagePrograms\Schemas\HomepageProgramForm;
use App\Filament\Resources\HomepagePrograms\Tables\HomepageProgramsTable;
use App\Models\HomepageProgram;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomepageProgramResource extends Resource
{
    protected static ?string $model = HomepageProgram::class;

    protected static ?string $navigationLabel = 'Programs';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $recordTitleAttribute = 'heading';

    public static function getNavigationGroup(): ?string
    {
        return 'Homepage Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 5; // Hero(1), About(2), Eligibility(3), Why Choose Us(4), Programs(5)
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) HomepageProgram::count();
    }

    public static function form(Schema $schema): Schema
    {
        return HomepageProgramForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomepageProgramsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomepagePrograms::route('/'),
            'create' => CreateHomepageProgram::route('/create'),
            'edit' => EditHomepageProgram::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_homepage_program') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_homepage_program') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_homepage_program') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_homepage_program') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_homepage_program') ?? false;
    }
}