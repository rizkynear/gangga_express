<?php

namespace App\Http\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Translatable;

    public $translationModel        = 'App\Http\Models\CompanyTranslation';
    protected $translatedAttributes = ['title', 'sub_title', 'content']; 
}
