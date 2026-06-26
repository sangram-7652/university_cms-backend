<?php

namespace App\Filament\Resources\HomepageEligibilities\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomepageEligibilityForm
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

                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('certificate_image')
                    ->image()
                    ->disk('public')
                    ->directory('homepage/eligibility')
                    ->imageEditor(),

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
