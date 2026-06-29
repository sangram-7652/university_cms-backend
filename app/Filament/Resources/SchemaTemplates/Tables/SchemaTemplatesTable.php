<?php

namespace App\Filament\Resources\SchemaTemplates\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class SchemaTemplatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('university.name')->label('University')->searchable()->sortable(),

                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('schema_type')
                    ->badge(),

                IconColumn::make('is_active')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->since(),

            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
