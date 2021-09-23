<?php

namespace Theme\Bfs\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;
use RvMedia;

class ProductDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => @$this->id,
            'name' => @$this->name,
            'slug' => @$this->slug,
            'price_formated' => format_price($this->front_sale_price_with_taxes),
            'discount_text' => get_sale_text($this->price, $this->sale_price),
            'rate_start' => (float)get_average_star_of_product($this->id),
            'sale_price' => $this->sale_price,
            'percentage_off' => (float)get_sale_percentage($this->price, $this->front_sale_price, true, false),
            'with_storehouse_management' => @$this->with_storehouse_management,
            'allow_checkout_when_out_of_stock' => @$this->allow_checkout_when_out_of_stock,
            'is_variation' => @$this->is_variation,
            'is_searchable' => @$this->is_searchable,
            'is_show_on_list' => @$this->is_show_on_list,
            'sale_type' => @$this->sale_type,
            'start_date' => @$this->start_date,
            'end_date' => @$this->end_date,
            'length' => @$this->length,
            'wide' => @$this->wide,
            'height' => @$this->height,
            'weight' => @$this->weight,
            'length_unit' => @$this->length_unit,
            'wide_unit' => @$this->wide_unit,
            'height_unit' => @$this->height_unit,
            'weight_unit' => @$this->weight_unit,
            'views' => @$this->views,
            'default_product_attributes' => $this->default_product_attributes,
            'categories' => ProductCategoryResource::collection($this->categories),
            'reviews' => @$this->reviews,
            'tags' => @$this->tags,
            'product_collections' => @$this->product_collections,
            'promotions' => @$this->promotions,
            'thumbnail' => RvMedia::getImageUrl($this->image, 'product-thumb', false, RvMedia::getDefaultImage()),
            'small_images' => get_product_url_images($this->images, 'product-thumb'),
            'big_images' => get_product_url_images($this->images),
            'description' => @$this->description,
            'specifications' => @$this->content
        ];
    }
}
