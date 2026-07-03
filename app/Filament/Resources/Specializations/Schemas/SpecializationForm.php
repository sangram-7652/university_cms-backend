<?php

namespace App\Filament\Resources\Specializations\Schemas;

use App\Forms\Components\SeoSection;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;


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
                                fn($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            ),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('code')
                            ->maxLength(100),

                    ])
                    ->columns(3),

                Section::make('Content')
                    ->schema([

                        Textarea::make('short_description')
                            ->rows(4)
                            ->columnSpanFull(),

                        RichEditor::make('description')
                            ->columnSpanFull(),

                    ]),



                Section::make('Academic Details')
                    ->schema([

                        TextInput::make('duration')
                            ->placeholder('e.g. 2 Years'),

                        TextInput::make('eligibility')
                            ->placeholder('e.g. Graduation'),

                    ])
                    ->columns(2),



                Section::make('Display Settings')
                    ->schema([

                        Toggle::make('is_featured')
                            ->default(false),

                        Toggle::make('is_active')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                    ])
                    ->columns(3),

                FileUpload::make('brochure')
                    ->label('Specialization Brochure (PDF)')
                    ->disk('public')
                    ->directory('brochures/specializations')
                    ->acceptedFileTypes([
                        'application/pdf',
                    ])
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull(),

                SeoSection::make(),
            ]);
    }
}
