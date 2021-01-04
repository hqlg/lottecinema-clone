<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'img_url' => $this->img_url,
            'movie_url' => $this->movie_url,
            'release_date' => $this->release_date,
            'price' => $this->price,
            'duration' => $this->duration,
        ];
    }
}
