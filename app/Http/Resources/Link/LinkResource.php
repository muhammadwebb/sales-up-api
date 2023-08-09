<?php

namespace App\Http\Resources\Link;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'source' => $this->source->title,
            'url' => $this->url,
            'price' => $this->price,
            'clicked' => $this->clicked,
        ];
    }
}
