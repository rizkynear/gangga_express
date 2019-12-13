<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'image'       => asset('storage/images/blogs/' . $this->image),
            'link'        => route('api.blog', $this->slug),
            'upload_at'   => $this->created_at->format('Y-m-d')
        ];
    }
}
