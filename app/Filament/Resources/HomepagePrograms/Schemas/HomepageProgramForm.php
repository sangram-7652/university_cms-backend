<?php

namespace App\Filament\Resources\HomepagePrograms\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HomepageProgramForm
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

                TextInput::make('heading')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('description')
                    ->columnSpanFull()
                    ->required(),

            ]);
    }
}