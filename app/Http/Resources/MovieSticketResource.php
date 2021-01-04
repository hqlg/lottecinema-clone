<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieSticketResource extends JsonResource
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
            'seat_id' => $this->seat_id,
            'movie_id' => $this->movie_id,
            'room_id' => $this->room_id,
        ];
    }
}
