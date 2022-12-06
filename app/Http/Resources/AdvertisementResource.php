<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        $tags = [];

        if (count($this->resource->tags) > 0)
        {
            foreach ($this->resource->tags as $tag)
            {
                $tags [] = [
                    'id' => $tag->id,
                    'name' => $tag->name
                ];
            }
        }

        //Create Tag Resource

//        dd($this->resource->files);
        if (count($this->resource->files) > 0)
        {
            return [
                'id' => $this->resource->id,
                'title' => $this->resource->title,
                'content' => $this->resource->content,
                'location' => $this->resource->location,
                'price' => $this->resource->price,
                'status' => $this->resource->status,
                'category' => $this->resource->category_id,
                'images' => $this->resource->files[0]->getUrl(),
                'tags' => $tags
            ];
        } else {
            return [
                'id' => $this->resource->id,
                'title' => $this->resource->title,
                'content' => $this->resource->content,
                'location' => $this->resource->location,
                'price' => $this->resource->price,
                'status' => $this->resource->status,
                'category' => null,
                'images' => null
            ];
        }

    }
}
