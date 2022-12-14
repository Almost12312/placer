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

        if (count($this->resource->files) > 0)
        {
            return [
                'name' => $this->resource->name,
                'lastname' => $this->resource->lastname,
                'middlename' => $this->resource->middlename,
                'city' => $this->resource->city,
                'created_at' => date($this->resource->created_at->format('d m Y')),
                'url' => $this->resource->files[0]->getUrl(),
                'favorites' => $this->resource->favorites(),
                'advPublish' => $this->resource->advertisements->where('status', '=', 1)->count(),
                'advDrafts' => $this->resource->advertisements->where('status', '=', 2)->count(),
//                'advHistory' => $this->resource->advertisements->where('status', '=', 3)->count()
            ];
        } else {
            return [
                'name' => $this->resource->name,
                'lastname' => $this->resource->lastname,
                'middlename' => $this->resource->middlename,
                'city' => $this->resource->city,
                'created_at' => date($this->resource->created_at->format('d m Y')),
                'url' => null,
                'favorites' => FavoriteResource::make($this->resource),
                'advPublish' => $this->resource->advertisements->where('status', '=', 1)->count(),
                'advDrafts' => $this->resource->advertisements->where('status', '=', 2)->count(),
//                'advHistory' => $this->resource->advertisements->where('status', '=', 3)->count()
            ];
        }

    }
}
