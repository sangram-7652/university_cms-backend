<?php

namespace App\Filament\Resources\StudyMaterials;

use App\Filament\Resources\StudyMaterials\Pages\CreateStudyMaterial;
use App\Filament\Resources\StudyMaterials\Pages\EditStudyMaterial;
use App\Filament\Resources\StudyMaterials\Pages\ListStudyMaterials;
use App\Filament\Resources\StudyMaterials\Schemas\StudyMaterialForm;
use App\Filament\Resources\StudyMaterials\Tables\StudyMaterialsTable;
use App\Models\StudyMaterial;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class StudyMaterialResource extends Resource
{
    protected static ?string $model = StudyMaterial::class;

    protected static ?string $navigationLabel = 'Study Material';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-book-open';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Student Zone';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) StudyMaterial::count();
    }

    public static function form(Schema $schema): Schema
    {
        return StudyMaterialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudyMaterialsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStudyMaterials::route('/'),
            'create' => CreateStudyMaterial::route('/create'),
            'edit' => EditStudyMaterial::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_study_material') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_study_material') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_study_material') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_study_material') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_study_material') ?? false;
    }
}
