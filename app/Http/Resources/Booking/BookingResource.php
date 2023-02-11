<?php

namespace App\Http\Resources\Booking;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'tour_id' => $this->tour_id,
            'client_id' => $this->client_id,
            'adults_count' => $this->adults_count,
            'children_count' => $this->children_count,
            'adult_price' => $this->adult_price,
            'child_price' => $this->child_price,
        ];

        return $data;
    }
}
