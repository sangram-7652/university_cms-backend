<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('university_id')
                    ->relationship('university', 'name')
                    ->disabled()
                    ->dehydrated(false),

                Select::make('course_id')
                    ->relationship('course', 'name')
                    ->disabled()
                    ->dehydrated(false),

                Select::make('specialization_id')
                    ->relationship('specialization', 'name')
                    ->disabled()
                    ->dehydrated(false),

                Select::make('assigned_to')
                    ->relationship('assignedUser', 'name')
                    ->label('Assigned To')
                    ->searchable()
                    ->preload(),

                TextInput::make('name')
                    ->required()
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('email')
                    ->email()
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('phone')
                    ->tel()
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('state')
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('source')
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('page_url')
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('ip_address')
                    ->disabled()
                    ->dehydrated(false),

                Select::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'follow_up' => 'Follow Up',
                        'qualified' => 'Qualified',
                        'admission_done' => 'Admission Done',
                        'lost' => 'Lost',
                    ])
                    ->required(),

                Textarea::make('remarks')
                    ->rows(4)
                    ->columnSpanFull(),

            ]);
    }
}
