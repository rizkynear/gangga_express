<?php

namespace App\Http\Models;

use App\Traits\ImageHandling;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Blog extends Model
{
    use Translatable, ImageHandling;

    protected $fillable = ['image'];
    public $translationModel = 'App\Http\Models\BlogTranslation';
    protected $translatedAttributes = ['title', 'description', 'slug'];
    protected $storePath = 'images/blogs'; 

    protected function imagePath()
    {
        return public_path('storage/images/blogs/');
    }

    protected function thumbnailPath()
    {
        return public_path('storage/images/blogs/thumbnail/');
    }
}
