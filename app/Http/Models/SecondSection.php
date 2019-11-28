<?php

namespace App\Http\Models;

use App\Traits\ImageHandling;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SecondSection extends Model
{
    use Translatable, ImageHandling;

    public $translationModel        = 'App\Http\Models\SecondSectionTranslation';
    protected $fillable             = ['image_1', 'image_2'];
    protected $translatedAttributes = ['title', 'sub_title', 'content']; 
    protected $storePath            = 'images/second-sections'; 

    protected function imagePath()
    {
        return public_path('storage/images/second-sections/');
    }

    protected function thumbnailPath()
    {
        return public_path('storage/images/second-sections/thumbnail/');
    }
}
