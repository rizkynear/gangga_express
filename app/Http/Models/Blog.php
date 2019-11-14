<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Blog extends Model
{
    use Translatable;

    protected $fillable = ['image'];
    public $translationModel = 'App\Http\Models\BlogTranslation';
    protected $translatedAttributes = ['title', 'description']; 

    public function translations()
    {
        return $this->hasMany('App\Http\Models\BlogTranslation');
    }
}
