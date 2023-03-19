<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexAdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "img_path" => $this->resource->img_path,
            "title" => $this->resource->title,
            "description" => $this->resource->description,
            "keywords" => $this->resource->assosiatedKeywords(),
            "rating" => $this->resource->rating(),
            "price" => $this->resource->price,
            "address" => new AddressResource($this->address)
        ];
    }
}
