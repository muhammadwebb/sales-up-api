<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->lead->first_name.' '. $this->lead->last_name,
            'phone' => $this->lead->phone,
            'course_name' => $this->course->title
        ];
    }
}
