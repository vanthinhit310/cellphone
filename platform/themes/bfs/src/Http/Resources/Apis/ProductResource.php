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
            'price_formated' => format_price($this->front_sale_price_with_taxes),
            'sale_price' => $this->sale_price,
            'image' => RvMedia::getImageUrl($this->image, 'product-thumb', false, RvMedia::getDefaultImage()),
            'percentage_off' => (float) get_sale_percentage($this->price, $this->front_sale_price, true, false),
            'price_with_taxes' => $this->price_with_taxes,
            'front_sale_price' => $this->front_sale_price,
        ];
    }
}
