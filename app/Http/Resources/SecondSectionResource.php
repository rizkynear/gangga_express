<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SecondSectionResource extends JsonResource
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
            'id'        => $this->id,
            'title'     => $this->title,
            'sub_title' => $this->sub_title,
            'content'   => $this->content,
            'image_1'   => asset('storage/images/second-sections/' . $this->image_1),
            'image_2'   => asset('storage/images/second-sections/' . $this->image_2)
        ];
    }
}
