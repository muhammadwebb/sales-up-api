<?php

namespace App\Http\Resources\Source;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SourceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'type_id' => $this->type_id,
            'company_id' => $this->company_id,
            'title' => $this->title
        ];
    }
}
