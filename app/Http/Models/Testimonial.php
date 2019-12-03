<?php

namespace App\Http\Models;

use App\Traits\ImageHandling;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use Translatable, ImageHandling;

    protected $translatedAttributes = ['description']; 
    protected $fillable             = ['name', 'nationality', 'image'];
    public $translationModel        = 'App\Http\Models\TestimonialTranslation';
    protected $storePath            = 'images/testimonials'; 

    protected function imagePath()
    {
        return public_path('storage/images/testimonials/');
    }

    protected function thumbnailPath()
    {
        return public_path('storage/images/testimonials/thumbnail/');
    }
}
