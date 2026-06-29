<?php

namespace App\Filament\Resources\RobotsSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RobotsSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('university.name')->label('University')->searchable()->sortable(),

                IconColumn::make('enabled')
                    ->label('Robots Enabled')
                    ->boolean(),

                TextColumn::make('default_user_agent')
                    ->label('User Agent')
                    ->badge(),

                IconColumn::make('include_sitemap')
                    ->label('Include Sitemap')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
