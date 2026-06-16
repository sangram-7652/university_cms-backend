<?php

namespace App\Filament\Resources\Semesters\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SemesterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('curriculum_id')
                    ->relationship('curriculum', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('semester_no')
                    ->numeric()
                    ->required()
                    ->minValue(1),

                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->default(true),

            ])
            ->columns(2);
    }
}