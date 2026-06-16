<?php

namespace App\Filament\Resources\SchemaTemplates;

use App\Filament\Resources\SchemaTemplates\Pages\CreateSchemaTemplate;
use App\Filament\Resources\SchemaTemplates\Pages\EditSchemaTemplate;
use App\Filament\Resources\SchemaTemplates\Pages\ListSchemaTemplates;
use App\Filament\Resources\SchemaTemplates\Schemas\SchemaTemplateForm;
use App\Filament\Resources\SchemaTemplates\Tables\SchemaTemplatesTable;
use App\Models\SchemaTemplate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class SchemaTemplateResource extends Resource
{
    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedCodeBracket;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'SEO Management';
    }

    public static function getNavigationLabel(): string
    {
        return 'Schema Engine';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }


    public static function form(Schema $schema): Schema
    {
        return SchemaTemplateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchemaTemplatesTable::configure($table);
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
            'index' => ListSchemaTemplates::route('/'),
            'create' => CreateSchemaTemplate::route('/create'),
            'edit' => EditSchemaTemplate::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_schema_template') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_schema_template') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_schema_template') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_schema_template') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_schema_template') ?? false;
    }
}
