<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThirdSectionResource extends JsonResource
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
            'title'     => $this->title,
            'sub_title' => $this->sub_title,
            'content'   => $this->content,
            'image'   => asset('storage/images/third-sections/' . $this->image)
        ];
    }
}
