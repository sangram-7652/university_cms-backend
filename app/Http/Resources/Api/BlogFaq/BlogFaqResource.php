<?php

namespace App\Http\Resources\Api\BlogFaq;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogFaqResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'question' => $this->question,

            'answer' => $this->answer,

            'sort_order' => $this->sort_order

        ];
    }
}
