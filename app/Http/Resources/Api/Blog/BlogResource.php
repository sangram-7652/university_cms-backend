<?php

namespace App\Http\Resources\Api\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'university_id'     => $this->university_id,
            'title'             => $this->title,
            'slug'              => $this->slug,
            'short_description' => $this->short_description,
            'featured_image'    => $this->featured_image,
            'author_name'       => $this->author_name,
            'published_at'      => $this->published_at,
            'views'             => $this->views,
        ];
    }
}