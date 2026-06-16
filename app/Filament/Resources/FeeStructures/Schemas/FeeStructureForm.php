<?php

namespace App\Filament\Resources\FeeStructures\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class FeeStructureForm
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

                Select::make('course_id')
                    ->relationship('course', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('specialization_id')
                    ->relationship('specialization', 'name')
                    ->searchable()
                    ->preload(),

                Toggle::make('is_active')
                    ->default(true),

                Repeater::make('items')
                    ->relationship()
                    ->schema([

                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('amount')
                            ->numeric()
                            ->prefix('₹')
                            ->required(),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                    ])
                    ->columnSpanFull()
                    ->collapsible()
                    ->reorderable(),

            ]);
    }
}
