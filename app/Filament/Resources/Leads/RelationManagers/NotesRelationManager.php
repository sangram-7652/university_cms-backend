<?php

namespace App\Filament\Resources\Leads\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;

use Filament\Resources\RelationManagers\RelationManager;

use Filament\Schemas\Schema;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class NotesRelationManager extends RelationManager
{
    protected static string $relationship = 'notes';

    protected static ?string $title = 'Lead Notes';



    public function form(Schema $schema): Schema
    {
        return $schema

            ->components([

                Textarea::make('note')
                    ->required()
                    ->rows(4),


                DateTimePicker::make('follow_up_at')
                    ->seconds(false),

            ]);
    }




    public function table(Table $table): Table
    {

        return $table

            ->columns([


                TextColumn::make('user.name')
                    ->label('Counsellor'),



                TextColumn::make('note')
                    ->words(10)
                    ->wrap(),



                TextColumn::make('follow_up_at')
                    ->dateTime(),



                TextColumn::make('created_at')
                    ->since(),


            ])



            ->headerActions([


                CreateAction::make()

                    ->mutateDataUsing(function (array $data): array {

                        $data['user_id'] = auth()->id();

                        return $data;
                    })


            ])



            ->actions([


                EditAction::make(),


                DeleteAction::make(),


            ])



            ->bulkActions([


                DeleteBulkAction::make()


            ]);
    }
}
