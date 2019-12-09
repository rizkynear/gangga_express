<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Image as InterventionImage;

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
        $request->image->storeAs($this->storePath, $imageName, 'public');

        InterventionImage::make($this->imagePath() . $imageName)
                         ->crop((int)$request->crop_width, (int)$request->crop_height, (int)$request->x_coordinate, (int)$request->y_coordinate)
                         ->save();

        InterventionImage::make($this->imagePath() . $imageName)->resize(null, 200, function ($constrait) {
            $constrait->aspectRatio();
        })->save($this->thumbnailPath() . $imageName);
    }

    public function deleteImage($imageName)
    {
        File::delete($this->imagePath() . $imageName);
        File::delete($this->thumbnailPath() . $imageName);
    }
}