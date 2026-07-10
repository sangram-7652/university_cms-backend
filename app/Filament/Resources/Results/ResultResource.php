<?php

namespace App\Filament\Resources\Results;

use App\Filament\Resources\Results\Pages\CreateResult;
use App\Filament\Resources\Results\Pages\EditResult;
use App\Filament\Resources\Results\Pages\ListResults;
use App\Filament\Resources\Results\Schemas\ResultForm;
use App\Filament\Resources\Results\Tables\ResultsTable;
use App\Models\Result;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ResultResource extends Resource
{
    protected static ?string $model = Result::class;

    protected static ?string $navigationLabel = 'Result';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-document-check';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Student Zone';
    }

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Result::count();
    }

    public static function form(Schema $schema): Schema
    {
        return ResultForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ResultsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListResults::route('/'),
            'create' => CreateResult::route('/create'),
            'edit' => EditResult::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_result') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_result') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_result') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_result') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_result') ?? false;
    }
}
