<?php

namespace App\Http\Models;

use App\Traits\ImageHandling;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CompanySecond extends Model
{
    use Translatable, ImageHandling;

    protected $fillable             = ['image'];
    public $translationModel        = 'App\Http\Models\CompanySecondTranslation';
    protected $translatedAttributes = ['title', 'sub_title', 'content'];
    protected $storePath            = 'images/company-seconds'; 

    protected function imagePath()
    {
        return public_path('storage/images/company-seconds/');
    }

    protected function thumbnailPath()
    {
        return public_path('storage/images/company-seconds/thumbnail/');
    }
}
