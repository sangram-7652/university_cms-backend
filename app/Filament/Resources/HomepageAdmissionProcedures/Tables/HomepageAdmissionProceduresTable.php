<?php

namespace App\Filament\Resources\HomepageAdmissionProcedures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomepageAdmissionProceduresTable
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

                TextColumn::make('procedure_steps')
                    ->label('Steps')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0),

                ToggleColumn::make('is_active'),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y h:i A')
                    ->sortable(),

            ])
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
