<?php

namespace App\Filament\Resources\CoursesFees\Pages;

use App\Filament\Resources\CoursesFees\CoursesFeeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCoursesFee extends EditRecord
{
    protected static string $resource = CoursesFeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
