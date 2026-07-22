<?php

namespace App\Filament\Resources\HomepageKeyHighlights\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomepageKeyHighlightsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('university.name')
                    ->label('University')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('icon')
                    ->badge(),

                TextColumn::make('sort_order')
                    ->sortable(),

                ToggleColumn::make('is_active'),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y h:i A')
                    ->sortable(),

            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
