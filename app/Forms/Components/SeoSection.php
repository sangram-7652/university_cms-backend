<?php

namespace App\Forms\Components;

use Filament\Schemas\Components\Section;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;


class SeoSection
{
    public static function make(): Section
    {
        return Section::make('SEO Settings')
            ->relationship('seo')
            ->schema([

                TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->maxLength(60),

                Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->rows(3)
                    ->maxLength(160),

                Textarea::make('meta_keywords')
                    ->label('Meta Keywords'),

                TextInput::make('canonical_url')
                    ->label('Canonical URL'),

                TextInput::make('og_title')
                    ->label('Open Graph Title'),

                Textarea::make('og_description')
                    ->label('Open Graph Description'),

                FileUpload::make('og_image')
                    ->image()
                    ->directory('seo'),

                TextInput::make('twitter_title'),

                Textarea::make('twitter_description')
                    ->rows(3),

                FileUpload::make('twitter_image')
                    ->image()
                    ->directory('seo'),

                Select::make('robots')
                    ->options([
                        'index,follow' => 'Index, Follow',
                        'noindex,follow' => 'NoIndex, Follow',
                        'noindex,nofollow' => 'NoIndex, NoFollow',
                    ])
                    ->default('index,follow'),

            ])
            ->columns(2)
            ->collapsible();
    }
}
