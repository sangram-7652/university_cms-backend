<?php

namespace App\Filament\Resources\CoursesFees;

use App\Filament\Resources\CoursesFees\Pages\CreateCoursesFee;
use App\Filament\Resources\CoursesFees\Pages\EditCoursesFee;
use App\Filament\Resources\CoursesFees\Pages\ListCoursesFees;
use App\Filament\Resources\CoursesFees\Schemas\CoursesFeeForm;
use App\Filament\Resources\CoursesFees\Tables\CoursesFeesTable;
use App\Models\CoursesFee;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CoursesFeeResource extends Resource
{
    protected static ?string $model = CoursesFee::class;

    protected static ?string $navigationLabel = 'Courses Fees';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-banknotes';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Student Zone';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) CoursesFee::count();
    }

    public static function form(Schema $schema): Schema
    {
        return CoursesFeeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesFeesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCoursesFees::route('/'),
            'create' => CreateCoursesFee::route('/create'),
            'edit' => EditCoursesFee::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_courses_fee') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_courses_fee') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit_courses_fee') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('delete_courses_fee') ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete_courses_fee') ?? false;
    }
}
