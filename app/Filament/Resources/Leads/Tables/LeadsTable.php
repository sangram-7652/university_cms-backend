<?php

namespace App\Filament\Resources\Leads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('university.name')
                    ->label('University')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('course.name')
                    ->label('Course')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('specialization.name')
                    ->label('Specialization')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('state')
                    ->searchable(),

                TextColumn::make('source')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {

                        'google' => 'success',

                        'facebook' => 'primary',

                        'homepage' => 'info',

                        'hero' => 'info',

                        'popup' => 'warning',

                        'course' => 'gray',

                        'blog' => 'gray',

                        'manual' => 'gray',

                        default => 'gray',
                    }),

                TextColumn::make('assignedUser.name')
                    ->label('Assigned To')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {

                        'new' => 'success',

                        'contacted' => 'primary',

                        'follow_up' => 'warning',

                        'qualified' => 'info',

                        'admission_done' => 'purple',

                        'lost' => 'danger',

                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

            ])

            ->filters([

                SelectFilter::make('status')
                    ->options([

                        'new' => 'New',

                        'contacted' => 'Contacted',

                        'follow_up' => 'Follow Up',

                        'qualified' => 'Qualified',

                        'admission_done' => 'Admission Done',

                        'lost' => 'Lost',

                    ]),

                SelectFilter::make('university_id')
                    ->relationship('university', 'name'),

                SelectFilter::make('course_id')
                    ->relationship('course', 'name'),

                SelectFilter::make('assigned_to')
                    ->relationship('assignedUser', 'name'),

            ])

            ->recordActions([

                EditAction::make()
                    ->slideOver(),

            ])

            ->toolbarActions([

                BulkActionGroup::make([

                    DeleteBulkAction::make(),

                ]),

            ]);
    }
}
