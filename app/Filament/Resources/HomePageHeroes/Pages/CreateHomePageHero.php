<?php

namespace App\Filament\Resources\HomePageHeroes\Pages;

use App\Filament\Resources\HomePageHeroes\HomePageHeroResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomePageHero extends CreateRecord
{
    protected static string $resource = HomePageHeroResource::class;
}
