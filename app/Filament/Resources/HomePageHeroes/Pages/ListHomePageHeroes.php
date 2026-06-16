<?php

namespace App\Filament\Resources\HomePageHeroes\Pages;

use App\Filament\Resources\HomePageHeroes\HomePageHeroResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomePageHeroes extends ListRecords
{
    protected static string $resource = HomePageHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
