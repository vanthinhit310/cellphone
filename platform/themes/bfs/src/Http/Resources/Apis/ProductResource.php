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
            'slug' => $this->slug,
            'price_formated' => format_price($this->front_sale_price_with_taxes),
            'discount_text' => get_sale_text($this->price, $this->sale_price),
            'rate_start' => (float)get_average_star_of_product($this->id),
            'sale_price' => $this->sale_price,
            'image' => RvMedia::getImageUrl($this->image, 'product-thumb', false, RvMedia::getDefaultImage()),
            'percentage_off' => (float) get_sale_percentage($this->price, $this->front_sale_price, true, false),
        ];
    }
}
