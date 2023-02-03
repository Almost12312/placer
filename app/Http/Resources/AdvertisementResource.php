<?php

namespace App\Http\Resources;

use App\Services\Images\Adaptiving;
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
        $images = null;

        //Check advs files
        if (count($this->resource->files) > 0)
        {
            $images = $this->resource->files[0]->getUrl();
//            $images = Adaptiving::create($this->resource->files[0], 260, 180);

        }

        // Check advs tags
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

        $adv = [
            'id' => $this->resource->id,
            'date' => strtotime($this->resource->created_at),
            'title' => $this->resource->title,
            'content' => $this->resource->content,
            'location' => $this->resource->location,
            'price' => $this->resource->price,
            'status' => $this->resource->status,
            'category' => $this->resource->category_id,
            'views' => $this->resource->views,
            'favorites' => count($this->resource->favorites),
            'images' => $images,
            'tags' => $tags
        ];

        return $adv;

    }
}
