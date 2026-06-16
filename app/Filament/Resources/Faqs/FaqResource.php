<?php

namespace App\Filament\Resources\Faqs;

use App\Filament\Resources\Faqs\Pages\CreateFaq;
use App\Filament\Resources\Faqs\Pages\EditFaq;
use App\Filament\Resources\Faqs\Pages\ListFaqs;
use App\Filament\Resources\Faqs\Schemas\FaqForm;
use App\Filament\Resources\Faqs\Tables\FaqsTable;
use App\Models\Faq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationLabel = 'FAQs';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-question-mark-circle';

    protected static ?string $recordTitleAttribute = 'question';

    public static function getNavigationGroup(): ?string
    {
        return 'Academic Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 7;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Faq::count();
    }

    public static function form(Schema $schema): Schema
    {
        return FaqForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FaqsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFaqs::route('/'),
            'create' => CreateFaq::route('/create'),
            'edit' => EditFaq::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_faq') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_faq') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_faq') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_faq') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_faq') ?? false;
    }
}
