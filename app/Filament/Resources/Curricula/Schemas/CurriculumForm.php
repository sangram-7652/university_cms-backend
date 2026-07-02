<?php

namespace App\Filament\Resources\Curricula\Schemas;

use App\Models\Course;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use App\Models\Specialization;

class CurriculumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | University
                |--------------------------------------------------------------------------
                */
                Select::make('university_id')
                    ->label('University')
                    ->relationship('university', 'name')
                    ->searchable()
                    ->preload()
                    ->disabled()
                    ->dehydrated()
                    ->required(),


                /*
                |--------------------------------------------------------------------------
                | Course
                |--------------------------------------------------------------------------
                */
                Select::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'name')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required()

                   

                    ->afterStateUpdated(function (Set $set, ?string $state) {

                            $set('specialization_id', null);

                            if (!$state) {
                                $set('university_id', null);
                                return;
                            }

                            $course = Course::find($state);

                            if ($course) {
                                $set('university_id', $course->university_id);
                            }
                        }),



                /*
                |--------------------------------------------------------------------------
                | Curriculum Type
                |--------------------------------------------------------------------------
                */
                Select::make('curriculum_type')
                    ->label('Curriculum Type')
                    ->options([
                        'course' => 'Course',
                        'specialization' => 'Specialization',
                    ])
                    ->live()
                    ->required(),



                /*
                |--------------------------------------------------------------------------
                | Specialization
                |--------------------------------------------------------------------------
                */
                Select::make('specialization_id')
                    ->label('Specialization')
                    ->options(function (Get $get) {

                        $courseId = $get('course_id');

                        if (! $courseId) {
                            return [];
                        }

                        return Specialization::where('course_id', $courseId)
                            ->orderBy('name')
                            ->pluck('name', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->visible(
                        fn (Get $get) =>
                        $get('curriculum_type') === 'specialization'
                    )
                    ->required(
                        fn (Get $get) =>
                        $get('curriculum_type') === 'specialization'
                    ),

                /*
                |--------------------------------------------------------------------------
                | Title
                |--------------------------------------------------------------------------
                */
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),



                /*
                |--------------------------------------------------------------------------
                | Description
                |--------------------------------------------------------------------------
                */
                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),



                /*
                |--------------------------------------------------------------------------
                | Status
                |--------------------------------------------------------------------------
                */
                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),

            ])
            ->columns(2);
    }
}
