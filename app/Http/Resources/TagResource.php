<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->resource->tags)
        {
            $tags = [];

            foreach ($this->resource->tags as $tag)
            {
                $tags[] = $tag->name;
            }

            return $tags;

        }   else
        {
            return [];
        }
    }
}
