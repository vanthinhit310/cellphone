<?php

namespace Theme\Bfs\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;
use RvMedia;

class VariationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => @$this->id,
            'product_id' => @$this->product_id,
            'configurable_product_id' => @$this->configurable_product_id,
            'is_default' => @$this->is_default,
            'attributes' => AttributeResource::collection($this->productAttributes)
        ];
    }
}
