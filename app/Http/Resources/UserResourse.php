<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {



        return [
            'name' => $this->resource->name,
            'city' => $this->resource->city,
            'created_at' => date($this->resource->created_at->format('d m Y')),
            'avatar' => $this->resource->file[0]->getUrl(),
            'advertisements' => $this->resource->advertisements->count()
        ];
    }
}
