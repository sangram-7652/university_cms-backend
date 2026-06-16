<?php

namespace App\Filament\Resources\BlogFaqs\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BlogFaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('blog_id')
                    ->relationship('blog', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),

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
                    ->default(true),

            ])
            ->columns(2);
    }
}
