<?php

namespace App\Filament\Resources\SchemaTemplates\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class SchemaTemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Schema Information')
                    ->schema([

                        TextInput::make('name')
                            ->required(),

                        Select::make('schema_type')
                            ->options([
                                'organization' => 'Organization',
                                'website' => 'Website',
                                'university' => 'University',
                                'course' => 'Course',
                                'specialization' => 'Specialization',
                                'article' => 'Article',
                                'faq' => 'FAQ',
                                'breadcrumb' => 'Breadcrumb',
                            ])
                            ->required(),

                        Toggle::make('is_active')
                            ->default(true),

                    ])
                    ->columns(3),

                Section::make('Description')
                    ->schema([

                        Textarea::make('description')
                            ->rows(5),

                    ]),

            ]);
    }
}
