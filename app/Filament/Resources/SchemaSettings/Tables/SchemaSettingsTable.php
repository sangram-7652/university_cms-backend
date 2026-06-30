<?php

namespace App\Filament\Resources\SchemaSettings\Tables;

use App\Models\SchemaSetting;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchemaSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('university.name')
                    ->label('University')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('page_type')
                    ->label('Page')
                    ->badge()
                    ->formatStateUsing(
                        fn (string $state) =>
                            SchemaSetting::pageTypes()[$state] ?? $state
                    )
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),

            ])
            ->filters([])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([]);
    }
}