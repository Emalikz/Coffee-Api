<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "product_name" => $this->product_name,
            "reference" => $this->reference,
            "price" => $this->price,
            "weight" => $this->weight,
            "stock" => $this->stock,
            "creator" => $this->creator,
        ];
    }
}
