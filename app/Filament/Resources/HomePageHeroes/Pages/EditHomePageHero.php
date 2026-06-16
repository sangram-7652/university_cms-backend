<?php

namespace App\Filament\Resources\HomePageHeroes\Pages;

use App\Filament\Resources\HomePageHeroes\HomePageHeroResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomePageHero extends EditRecord
{
    protected static string $resource = HomePageHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
