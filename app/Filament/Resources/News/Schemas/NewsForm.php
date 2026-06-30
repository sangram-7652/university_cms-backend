<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('university_id')
                    ->relationship('university', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(
                        fn($state, $set) =>
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                Textarea::make('excerpt')
                    ->rows(3)
                    ->maxLength(500),

                RichEditor::make('content')
                    ->nullable()
                    ->columnSpanFull()
                    ->helperText('Optional. Add news content if required.'),

                FileUpload::make('pdf_file')
                    ->label('PDF File')
                    ->disk('public')
                    ->directory('news-pdfs')
                    ->visibility('public')
                    ->acceptedFileTypes(['application/pdf'])
                    ->downloadable()
                    ->nullable()
                    ->helperText('Optional. Upload PDF if required.'),

                DatePicker::make('publish_date')
                    ->required()
                    ->default(now()),

                FileUpload::make('featured_image')
                    ->label('featured_image')
                    ->image()
                    ->directory('news')
                    ->imageEditor()
                    ->nullable(),

                Toggle::make('status')
                    ->default(true),

            ]);
    }
}
