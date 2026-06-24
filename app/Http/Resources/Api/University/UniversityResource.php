<?php

namespace App\Http\Resources\Api\University;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UniversityResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'name' => $this->name,

            'slug' => $this->slug,

            'subdomain' => $this->subdomain,

            'logo' => $this->logo,

            'favicon' => $this->favicon,

            'email' => $this->email,

            'phone' => $this->phone,

            'address' => $this->address,

            'primary_color' => $this->primary_color,

            'secondary_color' => $this->secondary_color,

            'accent_color' => $this->accent_color,

            'font_family' => $this->font_family,

            'is_active' => $this->is_active

        ];
    }
}
