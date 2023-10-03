<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'photo_url' => $this->getPhotoUrl(),
            'description' => $this->getDescription(),

            'about_photo_url' => $this->getAboutPhotoUrl(),
            'about_description' => $this->getAboutDescription(),

            'alt_text' => 'current photo',
        ];
    }
}
