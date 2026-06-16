<?php

namespace App\Filament\Resources\SeoSettings\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class SeoSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Basic SEO')
                    ->schema([

                        TextInput::make('site_name')
                            ->required(),

                        TextInput::make('default_title')
                            ->maxLength(60),

                        Textarea::make('default_description')
                            ->rows(3)
                            ->maxLength(160),

                        Textarea::make('default_keywords')
                            ->rows(3),

                        TextInput::make('canonical_domain')
                            ->placeholder('https://example.com'),

                    ])
                    ->columns(2),

                Section::make('Social Media')
                    ->schema([

                        FileUpload::make('default_og_image')
                            ->image()
                            ->directory('seo'),

                        TextInput::make('facebook_pixel_id'),

                        TextInput::make('google_analytics_id')
                            ->label('Google Analytics (GA4)'),

                        TextInput::make('google_tag_manager_id')
                            ->label('Google Tag Manager'),

                        TextInput::make('twitter_handle')
                            ->placeholder('@yourhandle'),

                    ])
                    ->columns(2),

                Section::make('Verification Codes')
                    ->schema([

                        Textarea::make('google_verification')
                            ->rows(3),

                        Textarea::make('bing_verification')
                            ->rows(3),

                    ])
                    ->columns(2),

                Section::make('Organization Information')
                    ->schema([

                        TextInput::make('contact_email')
                            ->email(),

                        TextInput::make('contact_phone'),

                    ])
                    ->columns(2),

                Section::make('SEO Features')
                    ->schema([

                        Toggle::make('enable_schema')
                            ->default(true),

                        Toggle::make('enable_sitemap')
                            ->default(true),

                        Toggle::make('enable_robots')
                            ->default(true),

                    ])
                    ->columns(3),

            ]);
    }
}
