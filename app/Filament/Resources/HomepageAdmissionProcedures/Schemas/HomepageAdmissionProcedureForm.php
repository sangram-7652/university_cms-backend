<?php

namespace App\Filament\Resources\HomepageAdmissionProcedures\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomepageAdmissionProcedureForm
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

                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull(),

                Repeater::make('procedure_steps')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->rows(2),

                        Select::make('icon')
                            ->options([
                                'users' => 'Users',
                                'clock' => 'Clock',
                                'shield' => 'Shield',
                                'award' => 'Award',
                                'graduation' => 'Graduation',
                                'book' => 'Book',
                                'globe' => 'Globe',
                                'building' => 'Building',
                                'filetext' => 'File Text',
                                'upload' => 'Upload',
                                'creditcard' => 'Credit Card',
                                'badgecheck' => 'Badge Check',
                            ])
                            ->searchable()
                            ->required(),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->columnSpanFull()
                    ->reorderable()
                    ->collapsible(),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->default(true),

            ])
            ->columns(2);
    }
}
