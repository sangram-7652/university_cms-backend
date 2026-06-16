<?php

namespace App\Filament\Resources\HomepageAbouts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomepageAboutForm
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

                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('subtitle')
                    ->maxLength(255),

                FileUpload::make('image')
                    ->directory('homepage/about')
                    ->image()
                    ->imageEditor(),

                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('vision')
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('mission')
                    ->rows(4)
                    ->columnSpanFull(),

                Toggle::make('status')
                    ->default(true),

            ])
            ->columns(2);
    }
}
