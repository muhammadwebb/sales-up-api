<?php

namespace App\Http\Resources\Lead;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->first_name. ' '. $this->last_name,
            'phone' => $this->phone,
            'status' => $this->status->title,
            'comments' => $this->comment
        ];
    }
}
