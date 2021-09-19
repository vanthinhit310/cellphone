<?php

namespace Theme\Bfs\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;
use RvMedia;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'order' => $this->order,
            'slug' => $this->slug,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'image' => RvMedia::getImageUrl($this->image, 'product-thumb'),
            'price_with_taxes' => $this->price_with_taxes,
            'front_sale_price' => $this->front_sale_price,
        ];
    }
}
