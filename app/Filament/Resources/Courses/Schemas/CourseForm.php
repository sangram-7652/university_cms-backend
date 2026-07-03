<?php

namespace App\Filament\Resources\Courses\Schemas;

use Illuminate\Support\Str;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use App\Forms\Components\SeoSection;
use Filament\Forms\Components\FileUpload;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([

                        Select::make('university_id')
                            ->relationship('university', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('name')
                            ->label('Course Name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            ),

                        TextInput::make('slug')
                            ->required(),

                        TextInput::make('short_name')
                            ->placeholder('BBA'),

                    ])
                    ->columns(2),

                Section::make('Course Details')
                    ->schema([

                        TextInput::make('duration')
                            ->numeric(),

                        Select::make('duration_type')
                            ->options([
                                'Years' => 'Years',
                                'Months' => 'Months',
                                'Weeks' => 'Weeks',
                            ])
                            ->default('Years'),

                        Select::make('course_level')
                            ->options([
                                'UG' => 'UG',
                                'PG' => 'PG',
                                'Diploma' => 'Diploma',
                                'Certificate' => 'Certificate',
                                'Doctorate' => 'Doctorate',
                            ]),

                        Select::make('study_mode')
                            ->options([
                                'Online' => 'Online',
                                'Distance' => 'Distance',
                                'Regular' => 'Regular',
                                'Hybrid' => 'Hybrid',
                            ]),

                        TextInput::make('language')
                            ->default('English'),

                    ])
                    ->columns(3),

                Section::make('Short Description')
                    ->schema([

                        Textarea::make('short_description')
                            ->rows(4),

                    ]),

                Section::make('Brochure')
                    ->schema([

                        FileUpload::make('brochure')
                            ->label('Course Brochure (PDF)')
                            ->disk('public')
                            ->directory('brochures')
                            ->acceptedFileTypes([
                                'application/pdf',
                            ])
                            ->downloadable()
                            ->openable(),

                    ]),

                Section::make('Course Content')
                    ->schema([

                        RichEditor::make('overview'),

                        RichEditor::make('eligibility'),

                        RichEditor::make('admission_process'),

                        RichEditor::make('career_scope'),

                    ]),

                Section::make('Settings')
                    ->schema([

                        Toggle::make('is_featured')
                            ->default(false),

                        Toggle::make('status')
                            ->default(true),

                    ])
                    ->columns(2),

                SeoSection::make(),

            ]);
    }
}
