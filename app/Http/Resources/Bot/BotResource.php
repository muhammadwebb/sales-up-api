<?php

namespace App\Http\Resources\Bot;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BotResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'bot' => $this->username,
            'contact' => $this->contact,
            'created_at' => $this->created_at
        ];
    }
}
