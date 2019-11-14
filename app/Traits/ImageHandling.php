<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageHandling
{
    public function __construct(array $attributes = [])
    {
        $imagePath     = $this->imagePath();
        $thumbnailPath = $this->thumbnailPath();

        if(! File::exists(public_path('storage/images'))) {
            File::makeDirectory(public_path('storage/images'));
        }

        if (! File::exists($imagePath)) {
            File::makeDirectory($imagePath);
        }
        
        if (! File::exists($thumbnailPath)) {
            File::makeDirectory($thumbnailPath);
        }
        
        parent::__construct($attributes);
    }

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

    public function deleteImage($imageName)
    {
        File::delete($this->imagePath() . $imageName);
        File::delete($this->thumbnailPath() . $imageName);
    }
}