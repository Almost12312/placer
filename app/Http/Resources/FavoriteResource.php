<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class FavoriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            $advs = $this->resource;
            $favorites = [];

            foreach ($advs as $adv) {
                if ($user->favorites->find($adv))
                {
                    $favorites[] = $adv->id;
                }
            }

            return $favorites;
        }

    }
}
