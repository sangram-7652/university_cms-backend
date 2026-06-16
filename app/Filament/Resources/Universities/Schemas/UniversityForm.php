<?php

namespace App\Filament\Resources\Universities\Schemas;

use App\Forms\Components\SeoSection;
use Filament\Forms\Components\ColorPicker;
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
                TextInput::make('logo'),
                TextInput::make('favicon'),
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
                // TextInput::make('primary_color')
                //     ->required(),
                // TextInput::make('secondary_color')
                //     ->required(),
                // TextInput::make('accent_color')
                //     ->required(),
                // TextInput::make('font_family'),
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
