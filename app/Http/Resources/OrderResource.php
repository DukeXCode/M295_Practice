<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'total' => $this->total,
            'status' => $this->status,
            'notes' => $this->notes,
            'created_at' => $this->created_at->format('d.m.Y'),
        ];
    }
}
