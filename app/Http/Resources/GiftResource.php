<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftResource extends JsonResource
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
            'price' => $this->price,
            'expiration_months' => $this->expiration_months,
            'product_content' => $this->product_content,
            'gift_category_id' => $this->gift_category_id,
        ];
    }
}
