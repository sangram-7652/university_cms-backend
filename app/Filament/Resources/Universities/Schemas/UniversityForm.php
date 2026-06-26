<?php

namespace App\Filament\Resources\Universities\Schemas;

use App\Forms\Components\SeoSection;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UniversityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('subdomain')
                    ->required(),
                FileUpload::make('logo')
                    ->image()
                    ->directory('universities/logo')
                    ->disk('public')
                    ->imageEditor()
                    ->maxSize(2048),

                FileUpload::make('favicon')
                    ->image()
                    ->directory('universities/favicon')
                    ->disk('public')
                    ->acceptedFileTypes([
                        'image/png',
                        'image/x-icon',
                        'image/vnd.microsoft.icon'
                    ])
                    ->maxSize(512),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('address'),
                ColorPicker::make('primary_color'),
                ColorPicker::make('secondary_color'),
                ColorPicker::make('accent_color'),
                Select::make('font_family')->options([
                    'Inter' => 'Inter',
                    'Poppins' => 'Poppins',
                    'Roboto' => 'Roboto'
                ]),
                TextInput::make('border_radius'),
                Toggle::make('is_active')
                    ->required(),
                SeoSection::make(),
            ]);
    }
}
