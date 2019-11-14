<?php

namespace App\Http\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use Translatable;

    protected $translatedAttributes = ['description']; 
    protected $fillable             = ['name', 'nationality', 'image'];
    public $translationModel        = 'App\Http\Models\TestimonialTranslation';
}
