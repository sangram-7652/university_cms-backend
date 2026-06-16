<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('semester_id')
                    ->relationship('semester', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('subject_code')
                    ->maxLength(50),

                TextInput::make('subject_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('credits')
                    ->numeric(),

                Select::make('subject_type')
                    ->options([
                        'theory' => 'Theory',
                        'practical' => 'Practical',
                        'project' => 'Project',
                        'elective' => 'Elective',
                    ])
                    ->required(),

                TextInput::make('display_order')
                    ->numeric()
                    ->default(0),

                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->default(true),

            ])
            ->columns(2);
    }
}
