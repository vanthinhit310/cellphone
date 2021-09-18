<?php

namespace Theme\Bfs\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;
use RvMedia;

class SlideResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => RvMedia::getImageUrl($this->image),
            'link' => $this->link,
            'description' => $this->description,
            'order' => $this->order,
        ];
    }
}
