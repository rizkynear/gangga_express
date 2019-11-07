<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait MakeImageFolder
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

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
    }
}