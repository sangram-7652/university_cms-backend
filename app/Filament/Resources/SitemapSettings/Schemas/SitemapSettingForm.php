<?php

namespace App\Filament\Resources\SitemapSettings\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class SitemapSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Included Content')
                    ->schema([

                        Toggle::make('universities_enabled')
                            ->label('Universities')
                            ->default(true),

                        Toggle::make('courses_enabled')
                            ->label('Courses')
                            ->default(true),

                        Toggle::make('specializations_enabled')
                            ->label('Specializations')
                            ->default(true),

                        Toggle::make('blogs_enabled')
                            ->label('Blogs')
                            ->default(true),

                    ])
                    ->columns(2),

                Section::make('Sitemap Configuration')
                    ->schema([

                        Select::make('change_frequency')
                            ->options([
                                'always' => 'Always',
                                'hourly' => 'Hourly',
                                'daily' => 'Daily',
                                'weekly' => 'Weekly',
                                'monthly' => 'Monthly',
                                'yearly' => 'Yearly',
                            ])
                            ->default('weekly')
                            ->required(),

                        TextInput::make('priority')
                            ->numeric()
                            ->default(0.8)
                            ->required()
                            ->helperText('Value between 0.1 and 1.0'),

                    ])
                    ->columns(2),

            ]);
    }
}
