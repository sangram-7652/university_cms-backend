<?php

namespace App\Filament\Resources\Courses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

use Filament\Tables\Filters\SelectFilter;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('university.name')
                    ->label('University')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Course Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('short_name')
                    ->searchable(),

                TextColumn::make('course_level')
                    ->badge()
                    ->sortable(),

                TextColumn::make('study_mode')
                    ->badge(),

                TextColumn::make('duration')
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->boolean(),

                IconColumn::make('status')
                    ->boolean(),

            ])

            ->filters([

                SelectFilter::make('course_level')
                    ->options([
                        'UG' => 'UG',
                        'PG' => 'PG',
                        'Diploma' => 'Diploma',
                        'Certificate' => 'Certificate',
                        'Doctorate' => 'Doctorate',
                    ]),

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
