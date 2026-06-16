<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('course_id')
                    ->relationship('course', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->live(),

                Select::make('specialization_id')
                    ->relationship(
                        'specialization',
                        'name',
                        fn($query, $get) =>
                        $query->where('course_id', $get('course_id'))
                    )
                    ->searchable()
                    ->preload(),

                TextInput::make('question')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                RichEditor::make('answer')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Toggle::make('status')
                    ->default(true)
                    ->required(),

            ])
            ->columns(2);
    }
}
