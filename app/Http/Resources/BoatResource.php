<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoatResource extends JsonResource
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
            'id'       => $this->id,
            'name'     => $this->name,
            'engine'   => $this->engine,
            'capacity' => $this->capacity,
            'length'   => $this->length,
            'width'    => $this->width,
            'image'    => asset('storage/images/boats/' . $this->image)
        ];
    }
}
