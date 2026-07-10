<?php

namespace App\Filament\Resources\HallTickets\Schemas;

use App\Forms\Components\SeoSection;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HallTicketForm
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

                Section::make('Content')
                    ->schema([

                        RichEditor::make('content')
                            ->columnSpanFull()
                            ->required(),

                    ]),

                SeoSection::make(),

            ]);
    }
}
