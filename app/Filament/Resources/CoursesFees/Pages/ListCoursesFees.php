<?php

namespace App\Filament\Resources\CoursesFees\Pages;

use App\Filament\Resources\CoursesFees\CoursesFeeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCoursesFees extends ListRecords
{
    protected static string $resource = CoursesFeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
