<?php

namespace App\Http\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SecondSection extends Model
{
    use Translatable;

    protected $translatedAttributes = ['title', 'sub_title', 'content']; 
    protected $fillable             = ['image_1', 'image_2'];
    public $translationModel        = 'App\Http\Models\SecondSectionTranslation';
}
