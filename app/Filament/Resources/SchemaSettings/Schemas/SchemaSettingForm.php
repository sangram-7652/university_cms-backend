<?php

namespace App\Filament\Resources\SchemaSettings\Schemas;

use App\Models\SchemaSetting;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SchemaSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Placeholder::make('university')
                    ->label('University')
                    ->content(fn (SchemaSetting $record): string => $record->university->name),

                Placeholder::make('page_type')
                    ->label('Page')
                    ->content(fn (SchemaSetting $record): string => SchemaSetting::pageTypes()[$record->page_type] ?? $record->page_type),

                Toggle::make('is_active')
                    ->label('Schema Enabled')
                    ->default(true)
                    ->required(),

            ]);
    }
}