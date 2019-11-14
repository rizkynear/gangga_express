<?php

namespace App\Http\Models;

use App\Traits\ImageHandling;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use ImageHandling;

    protected $fillable  = ['image'];
    protected $storePath = 'images/sliders'; 

    protected function imagePath()
    {
        return public_path('storage/images/sliders/');
    }

    protected function thumbnailPath()
    {
        return public_path('storage/images/sliders/thumbnail/');
    }
}
