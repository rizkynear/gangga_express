<?php

namespace App\Http\Models;

use App\Traits\ImageHandling;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CompanyFirst extends Model
{
    use Translatable, ImageHandling;

    protected $fillable             = ['image'];
    public $translationModel        = 'App\Http\Models\CompanyFirstTranslation';
    protected $translatedAttributes = ['title', 'sub_title', 'content']; 
    protected $storePath            = 'images/company-firsts'; 

    protected function imagePath()
    {
        return public_path('storage/images/company-firsts/');
    }

    protected function thumbnailPath()
    {
        return public_path('storage/images/company-firsts/thumbnail/');
    }
}
