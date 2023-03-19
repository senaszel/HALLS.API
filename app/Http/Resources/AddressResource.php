<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'street' => $this->resource->street,
            'number' => $this->resource->number,
            'postcode' => $this->resource->postcode,
            'city' => $this->resource->city,
        ];
    }
}
