<?php

namespace Theme\Bfs\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            "count" => @$this->count(),
            "currentPage" => @$this->currentPage(),
            "hasPages" => @$this->hasPages(),
            "hasMorePages" => @$this->hasMorePages(),
            "lastPage" => @$this->lastPage(),
            "nextPageUrl" => @$this->nextPageUrl(),
            "previousPageUrl" => @$this->previousPageUrl(),
            "perPage" => @$this->perPage(),
            "total" => @$this->total(),
            "pageName" => @$this->getPageName(),
        ];
    }
}
