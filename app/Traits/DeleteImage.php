<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait DeleteImage
{
    public function deleteImage($imageName)
    {
        File::delete($this->imagePath() . $imageName);
        File::delete($this->thumbnailPath() . $imageName);
    }
}