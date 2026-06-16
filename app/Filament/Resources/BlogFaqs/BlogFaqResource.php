<?php

namespace App\Filament\Resources\BlogFaqs;

use App\Filament\Resources\BlogFaqs\Pages\CreateBlogFaq;
use App\Filament\Resources\BlogFaqs\Pages\EditBlogFaq;
use App\Filament\Resources\BlogFaqs\Pages\ListBlogFaqs;
use App\Filament\Resources\BlogFaqs\Schemas\BlogFaqForm;
use App\Filament\Resources\BlogFaqs\Tables\BlogFaqsTable;
use App\Models\BlogFaq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class BlogFaqResource extends Resource
{
    protected static ?string $navigationLabel = 'Blog FAQs';

    public static function getNavigationGroup(): ?string
    {
        return 'Content Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) BlogFaq::count();
    }
    public static function form(Schema $schema): Schema
    {
        return BlogFaqForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogFaqsTable::configure($table);
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
            'index' => ListBlogFaqs::route('/'),
            'create' => CreateBlogFaq::route('/create'),
            'edit' => EditBlogFaq::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()->can('view_blog_faq');
    }

    public static function canCreate(): bool
    {
        return auth()->check()
            && auth()->user()->can('create_blog_faq');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->check()
            && auth()->user()->can('edit_blog_faq');
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->check()
            && auth()->user()->can('delete_blog_faq');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check()
            && auth()->user()->can('delete_blog_faq');
    }
}
