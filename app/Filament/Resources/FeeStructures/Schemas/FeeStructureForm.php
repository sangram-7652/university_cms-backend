<?php

namespace App\Filament\Resources\FeeStructures\Schemas;

use App\Models\Course;
use App\Models\Specialization;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class FeeStructureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([


                Select::make('course_id')
                    ->relationship('course', 'name')
                    ->searchable()
                    ->preload()
                    ->live()

                    ->afterStateUpdated(function ($state, Set $set) {

                        if (!$state) {
                            return;
                        }

                        $course = Course::find($state);

                        if (!$course) {
                            return;
                        }

                        // Auto University
                        $set(
                            'university_id',
                            $course->university_id
                        );

                        // Reset specialization
                        $set(
                            'specialization_id',
                            null
                        );
                    })

                    ->required(),




                Select::make('specialization_id')
                    ->relationship('specialization', 'name')
                    ->searchable()
                    ->preload()
                    ->live()

                    ->afterStateUpdated(function ($state, Set $set) {

                        if (!$state) {
                            return;
                        }

                        $specialization = Specialization::with('course')
                            ->find($state);

                        if (!$specialization) {
                            return;
                        }


                        // Auto Course
                        $set(
                            'course_id',
                            $specialization->course_id
                        );


                        // Auto University
                        $set(
                            'university_id',
                            $specialization->course->university_id
                        );
                    }),




                Select::make('university_id')
                    ->relationship('university', 'name')
                    ->disabled()
                    ->dehydrated()
                    ->searchable()
                    ->preload()
                    ->required(),



                Toggle::make('is_active')
                    ->default(true),




                Repeater::make('items')
                    ->relationship()

                    ->schema([

                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),


                        TextInput::make('amount')
                            ->numeric()
                            ->prefix('₹')
                            ->required(),


                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                    ])

                    ->columnSpanFull()
                    ->collapsible()
                    ->reorderable(),

            ]);
    }
}
