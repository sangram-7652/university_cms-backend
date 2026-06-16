<?php

namespace App\Filament\Resources\Courses;

use App\Filament\Resources\Courses\Pages\CreateCourse;
use App\Filament\Resources\Courses\Pages\EditCourse;
use App\Filament\Resources\Courses\Pages\ListCourses;
use App\Filament\Resources\Courses\Schemas\CourseForm;
use App\Filament\Resources\Courses\Tables\CoursesTable;
use App\Models\Course;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationLabel = 'Courses';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-academic-cap';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'Academic Management';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Course::count();
    }

    public static function form(Schema $schema): Schema
    {
        return CourseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCourses::route('/'),
            'create' => CreateCourse::route('/create'),
            'edit' => EditCourse::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()->can('view_course');
    }

    public static function canCreate(): bool
    {
        return auth()->check()
            && auth()->user()->can('create_course');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->check()
            && auth()->user()->can('edit_course');
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->check()
            && auth()->user()->can('delete_course');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check()
            && auth()->user()->can('delete_course');
    }
}
