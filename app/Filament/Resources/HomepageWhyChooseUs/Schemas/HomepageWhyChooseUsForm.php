<?php

namespace App\Filament\Resources\HomepageWhyChooseUs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomepageWhyChooseUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('university_id')
                    ->relationship('university', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('subtitle')
                    ->label('Section Label')
                    ->maxLength(255),

                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('homepage/why-choose-us'),
                    ->visibility('public')
                    ->imageEditor()

                Repeater::make('points')
                    ->schema([
                        TextInput::make('value')
                            ->label('Point')
                            ->required(),
                    ])
                    ->defaultItems(4)
                    ->columnSpanFull()
                    ->reorderable(),

                TextInput::make('button_text')
                    ->maxLength(255),

                TextInput::make('button_url')
                    ->maxLength(255),

                Toggle::make('status')
                    ->default(true),

            ])
            ->columns(2);
    }
}
