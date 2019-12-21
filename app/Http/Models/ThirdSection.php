<?php

namespace App\Http\Models;

use App\Traits\ImageHandling;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ThirdSection extends Model
{
    use Translatable, ImageHandling;

    public $translationModel        = 'App\Http\Models\ThirdSectionTranslation';
    protected $fillable             = ['image'];
    protected $translatedAttributes = ['title', 'sub_title', 'content']; 
    protected $storePath            = 'images/third-sections'; 

    protected function imagePath()
    {
        return public_path('storage/images/third-sections/');
    }

    protected function thumbnailPath()
    {
        return public_path('storage/images/third-sections/thumbnail/');
    }
}
