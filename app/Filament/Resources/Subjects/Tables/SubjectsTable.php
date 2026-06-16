<?php

namespace App\Filament\Resources\Subjects\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class SubjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('semester.curriculum.title')
                    ->label('Curriculum')
                    ->searchable(),

                TextColumn::make('semester.title')
                    ->label('Semester')
                    ->sortable(),

                TextColumn::make('subject_code')
                    ->searchable(),

                TextColumn::make('subject_name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('credits')
                    ->sortable(),

                TextColumn::make('subject_type')
                    ->badge(),

                IconColumn::make('is_active')
                    ->boolean(),

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
