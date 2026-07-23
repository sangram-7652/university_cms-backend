<?php

namespace App\Filament\Resources\HomepageKeyHighlights\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomepageKeyHighlightForm
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

                RichEditor::make('description')
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'bulletList',
                        'orderedList',
                        'h2',
                        'h3',
                        'blockquote',
                        'link',
                        'undo',
                        'redo',
                    ]),

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
                    ])
                    ->searchable()
                    ->required(),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->default(true),

            ])
            ->columns(2);
    }
}
