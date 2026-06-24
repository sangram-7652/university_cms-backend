<?php

namespace App\Http\Resources\Api\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogDetailResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'title' => $this->title,

            'slug' => $this->slug,

            'short_description' => $this->short_description,

            'content' => $this->content,

            'featured_image' => $this->featured_image,

            'author_name' => $this->author_name,

            'published_at' => $this->published_at,

            'views' => $this->views,

            'created_at' => $this->created_at,

        ];
    }
}
