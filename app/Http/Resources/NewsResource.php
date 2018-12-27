<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "body" => $this->body,
            "image" => $this->image,
            "category_id" => $this->category_id,
            "type" => $this->type,
            "published" => $this->published,
            "published_at" => $this->published_at,
            "category" => new CategoryResource($this->category),
        ];
    }
}
