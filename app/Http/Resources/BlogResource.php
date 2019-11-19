<?php

namespace App\Http\Resources;

use App\Traits\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    // use Translate;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'image'       => $this->image,
            'link'        => route('api.blog', $this->slug),
            'upload_at'   => $this->created_at
        ];
    }
}
