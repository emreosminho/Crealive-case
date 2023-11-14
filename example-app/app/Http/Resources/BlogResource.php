<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed title
 * @property mixed user_id
 * @property mixed contents
 */
class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id, 
            'title' => $this->title,
            'user_id' => $this->user_id,
            'contents' => $this->contents,
            'categories' => BlogToCategoryResource::collection($this->subcategories)
        ];
    }
}
