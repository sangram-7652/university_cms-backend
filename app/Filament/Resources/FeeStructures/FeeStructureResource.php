<?php

namespace App\Filament\Resources\FeeStructures;

use App\Filament\Resources\FeeStructures\Pages\CreateFeeStructure;
use App\Filament\Resources\FeeStructures\Pages\EditFeeStructure;
use App\Filament\Resources\FeeStructures\Pages\ListFeeStructures;
use App\Filament\Resources\FeeStructures\Schemas\FeeStructureForm;
use App\Filament\Resources\FeeStructures\Tables\FeeStructuresTable;
use App\Models\FeeStructure;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class FeeStructureResource extends Resource
{
    protected static ?string $model = FeeStructure::class;

    protected static ?string $navigationLabel = 'Fee Structure';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-academic-cap';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'Academic Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) FeeStructure::count();
    }

    public static function form(Schema $schema): Schema
    {
        return FeeStructureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeeStructuresTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFeeStructures::route('/'),
            'create' => CreateFeeStructure::route('/create'),
            'edit' => EditFeeStructure::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_fee_structure') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_fee_structure') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_fee_structure') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_fee_structure') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_fee_structure') ?? false;
    }
}
