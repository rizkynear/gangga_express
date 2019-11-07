<?php

namespace App\Traits;

use Image as InterventionImage;

trait StoreImage
{
    public function storeImage($request, $imageName)
    {
        $request->storeAs($this->storePath, $imageName, 'public');
    }

    public function storeThumbnail($imageName, $width = null, $height = null)
    {
        InterventionImage::make($this->imagePath() . $imageName)->resize($width, $height, function ($constrait) {
            $constrait->aspectRatio();
        })->save($this->thumbnailPath() . $imageName);
    }
}