<?php

namespace App\Filament\Resources\Specializations\Schemas;

use App\Forms\Components\SeoSection;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SpecializationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Course Information')
                    ->schema([
                        Select::make('course_id')
                            ->relationship('course', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),

                Section::make('Basic Information')
                    ->schema([

                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn ($state, callable $set) => $set('slug', Str::slug($state))
                            ),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('code')
                            ->maxLength(100),

                    ])
                    ->columns(3),

                Section::make('Academic Details')
                    ->schema([

                        TextInput::make('duration')
                            ->numeric()
                            ->minValue(1)
                            ->placeholder('e.g. 2'),

                        Select::make('duration_type')
                            ->options([
                                'Years' => 'Years',
                                'Months' => 'Months',
                                'Weeks' => 'Weeks',
                            ])
                            ->default('Years')
                            ->required(),
                          Select::make('course_level')
                            ->label('Course Level')
                            ->options([
                                'UG' => 'UG',
                                'PG' => 'PG',
                                'Diploma' => 'Diploma',
                                'Certificate' => 'Certificate',
                                'Doctorate' => 'Doctorate',
                            ])
                            ->required(),
                             Select::make('study_mode')
                                ->label('Study Mode')
                                ->options([
                                    'Distance' => 'Distance',
                                    'Online' => 'Online',
                                    'Regular' => 'Regular',
                                    'Hybrid' => 'Hybrid',
                                ])
                                ->required(),

                                TextInput::make('language')
                                    ->default('English')
                                    ->required(),

                    ])
                    ->columns(3),

                Section::make('Content')
                    ->schema([

                        Textarea::make('short_description')
                            ->rows(4)
                            ->columnSpanFull(),

                        RichEditor::make('overview')
                            ->columnSpanFull(),

                        RichEditor::make('eligibility')
                            ->columnSpanFull(),

                        RichEditor::make('admission_process')
                            ->columnSpanFull(),

                        RichEditor::make('career_scope')
                            ->columnSpanFull(),

                    ]),

                Section::make('Display Settings')
                    ->schema([

                        Toggle::make('is_featured')
                            ->default(false),

                        Toggle::make('status')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                    ])
                    ->columns(3),

                Section::make('Brochure')
                    ->schema([

                        FileUpload::make('brochure')
                            ->label('Specialization Brochure (PDF)')
                            ->disk('public')
                            ->directory('brochures/specializations')
                            ->acceptedFileTypes([
                                'application/pdf',
                            ])
                            ->downloadable()
                            ->openable(),

                    ]),

                SeoSection::make(),

            ]);
    }
}