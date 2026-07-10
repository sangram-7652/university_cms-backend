<?php

namespace App\Filament\Resources\AlternativeUniversities\Schemas;

use App\Forms\Components\SeoSection;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AlternativeUniversityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Page Information')
                    ->schema([

                        Select::make('university_id')
                            ->relationship('university', 'name')
                            ->label('University')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull(),

                    ]),

                Section::make('Comparison Universities')
                    ->schema([

                        Repeater::make('items')
                            ->relationship()
                            ->reorderable()
                            ->schema([

                                TextInput::make('university_name')
                                    ->label('University')
                                    ->required(),

                                TextInput::make('mode')
                                    ->required(),

                                TextInput::make('naac_grade')
                                    ->label('NAAC Grade')
                                    ->required(),

                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),

                            ])
                            ->columns(4)
                            ->columnSpanFull(),

                    ]),

                Section::make('Bottom Content')
                    ->schema([

                        RichEditor::make('content')
                            ->columnSpanFull(),

                    ]),

                SeoSection::make(),

            ]);
    }
}