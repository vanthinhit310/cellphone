<?php

namespace Theme\Bfs\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;
use RvMedia;

class ProductCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => RvMedia::getImageUrl($this->image),
            'description' => $this->description,
            'order' => $this->order,
            'slug' => $this->slug,
        ];
    }
}
