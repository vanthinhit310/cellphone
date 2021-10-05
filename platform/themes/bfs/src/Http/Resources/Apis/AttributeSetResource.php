<?php

namespace Theme\Bfs\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;
use Platform\Ecommerce\Repositories\Interfaces\ProductAttributeInterface;
use RvMedia;

class AttributeSetResource extends JsonResource
{
    public function toArray($request)
    {
        $attributes = app(ProductAttributeInterface::class)->allBy(['attribute_set_id' => $this->id]);
        return [
            'id' => @$this->id,
            'title' => @$this->title,
            'slug' => @$this->slug,
            'attributes' => AttributeResource::collection($attributes)
        ];
    }
}
