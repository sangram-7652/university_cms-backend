<?php

namespace App\Filament\Resources\HomePageHeroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class HomePageHeroForm
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

                TextInput::make('badge_text')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

                TextInput::make('primary_button_text')
                    ->required(),

                TextInput::make('primary_button_url')
                    ->required(),

                TextInput::make('secondary_button_text')
                    ->required(),

                TextInput::make('secondary_button_url')
                    ->required(),

                TextInput::make('video_url')
                    ->url(),

                FileUpload::make('podcast_audio')
                    ->label('Podcast Audio')
                    ->disk('public')
                    ->directory('podcasts')
                    ->acceptedFileTypes([
                        'audio/mpeg',
                        'audio/mp3',
                        'audio/wav',
                        'audio/ogg',
                    ])
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull(),

                FileUpload::make('hero_image')
                    ->image()
                    ->disk('public')
                    ->directory('homepage/heroes')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull(),
            ]);
    }
}
