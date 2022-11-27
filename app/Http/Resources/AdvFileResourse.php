<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvFileResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $adv = $this->resource->files;
        $advFile = [];

        foreach ($adv as $file)
        {
            $advFile[] = [
                "id" => $file->id,
                "url" => $file->getUrl()
            ];
        }

        return [
                'data' => $advFile
            ];
        }
    }
