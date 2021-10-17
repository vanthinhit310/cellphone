<?php

namespace Theme\Bfs\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;
use RvMedia;

class AttributeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => @$this->id,
            'attribute_set_id' => @$this->attribute_set_id,
            'title' => @$this->title,
            'slug' => @$this->slug,
            'is_default' => @$this->is_default,
        ];
    }
}
