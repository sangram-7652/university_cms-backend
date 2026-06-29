<?php

namespace App\Filament\Resources\SitemapSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SitemapSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('university.name')
                    ->label('University')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('universities_enabled')
                    ->label('Universities')
                    ->boolean(),

                IconColumn::make('courses_enabled')
                    ->label('Courses')
                    ->boolean(),

                IconColumn::make('specializations_enabled')
                    ->label('Specializations')
                    ->boolean(),

                IconColumn::make('blogs_enabled')
                    ->label('Blogs')
                    ->boolean(),

                TextColumn::make('change_frequency')
                    ->label('Frequency')
                    ->badge(),

                TextColumn::make('priority')
                    ->label('Priority')
                    ->badge(),

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
