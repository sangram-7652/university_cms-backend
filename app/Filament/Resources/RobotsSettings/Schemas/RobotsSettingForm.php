<?php

namespace App\Filament\Resources\RobotsSettings\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;

class RobotsSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('University')
                    ->schema([
                        Select::make('university_id')
                            ->relationship('university', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                    ]),

                Section::make('General Settings')
                    ->schema([

                        Toggle::make('enabled')
                            ->label('Enable Robots.txt')
                            ->default(true),

                        Toggle::make('include_sitemap')
                            ->label('Include Sitemap URL')
                            ->default(true),

                        TextInput::make('default_user_agent')
                            ->label('User Agent')
                            ->default('*')
                            ->required(),

                    ])
                    ->columns(3),

                Section::make('Allowed Paths')
                    ->schema([

                        Repeater::make('allow_paths')
                            ->schema([
                                TextInput::make('path')
                                    ->placeholder('/')
                                    ->required(),
                            ])
                            ->default([
                                ['path' => '/'],
                            ])
                            ->columnSpanFull(),

                    ]),

                Section::make('Disallowed Paths')
                    ->schema([

                        Repeater::make('disallow_paths')
                            ->schema([
                                TextInput::make('path')
                                    ->required(),
                            ])
                            ->default([
                                ['path' => '/admin'],
                                ['path' => '/filament'],
                                ['path' => '/login'],
                                ['path' => '/register'],
                            ])
                            ->columnSpanFull(),

                    ]),

                Section::make('Custom Robots Content')
                    ->schema([

                        Textarea::make('custom_content')
                            ->rows(10)
                            ->columnSpanFull()
                            ->helperText(
                                'Optional custom robots.txt rules.'
                            ),

                    ]),

            ]);
    }
}
