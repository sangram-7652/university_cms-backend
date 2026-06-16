<?php

namespace App\Filament\Resources\HomepageFaqs;

use App\Filament\Resources\HomepageFaqs\Pages\CreateHomepageFaq;
use App\Filament\Resources\HomepageFaqs\Pages\EditHomepageFaq;
use App\Filament\Resources\HomepageFaqs\Pages\ListHomepageFaqs;
use App\Filament\Resources\HomepageFaqs\Schemas\HomepageFaqForm;
use App\Filament\Resources\HomepageFaqs\Tables\HomepageFaqsTable;
use App\Models\HomepageFaq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class HomepageFaqResource extends Resource
{
    protected static ?string $model = HomepageFaq::class;

    protected static ?string $navigationLabel = 'FAQ';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-question-mark-circle';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Homepage Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 5;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) HomepageFaq::count();
    }

    public static function form(Schema $schema): Schema
    {
        return HomepageFaqForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomepageFaqsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomepageFaqs::route('/'),
            'create' => CreateHomepageFaq::route('/create'),
            'edit' => EditHomepageFaq::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_homepage_faq') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_homepage_faq') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_homepage_faq') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_homepage_faq') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_homepage_faq') ?? false;
    }
}
