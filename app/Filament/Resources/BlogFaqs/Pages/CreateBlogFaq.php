<?php

namespace App\Filament\Resources\BlogFaqs\Pages;

use App\Filament\Resources\BlogFaqs\BlogFaqResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogFaq extends CreateRecord
{
    protected static string $resource = BlogFaqResource::class;
}
