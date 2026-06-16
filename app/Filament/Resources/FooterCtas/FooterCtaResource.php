<?php

namespace App\Filament\Resources\FooterCtas;

use App\Filament\Resources\FooterCtas\Pages\CreateFooterCta;
use App\Filament\Resources\FooterCtas\Pages\EditFooterCta;
use App\Filament\Resources\FooterCtas\Pages\ListFooterCtas;
use App\Filament\Resources\FooterCtas\Schemas\FooterCtaForm;
use App\Filament\Resources\FooterCtas\Tables\FooterCtasTable;
use App\Models\FooterCta;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class FooterCtaResource extends Resource
{
    protected static ?string $model = FooterCta::class;

    protected static ?string $navigationLabel = 'Footer CTA';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-megaphone';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Homepage Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 6;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) FooterCta::count();
    }

    public static function form(Schema $schema): Schema
    {
        return FooterCtaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FooterCtasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFooterCtas::route('/'),
            'create' => CreateFooterCta::route('/create'),
            'edit' => EditFooterCta::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_footer_cta') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_footer_cta') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_footer_cta') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_footer_cta') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_footer_cta') ?? false;
    }
}
