<?php

namespace App\Filament\Resources\CoursesFees\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;

use App\Forms\Components\SeoSection;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class CoursesFeeForm
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

                Section::make('Courses & Fees')
                    ->schema([

                        Repeater::make('items')
                            ->relationship()
                            ->reorderable()
                            ->schema([

                                TextInput::make('course_name')
                                    ->label('Course')
                                    ->required(),

                                TextInput::make('duration')
                                    ->required(),

                                TextInput::make('total_fee')
                                    ->label('Total Fee')
                                    ->required()
                                    ->placeholder('₹27,999'),

                            ])
                            ->columns(3)
                            ->columnSpanFull(),

                    ]),

                Section::make('Bottom Content')
                    ->schema([

                        RichEditor::make('footer_content')
                            ->columnSpanFull(),

                    ]),

                SeoSection::make(),

            ]);
    }
}
