<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Blog extends Model
{
    use Translatable;

    protected $fillable = ['image'];
    public $translationModel = 'App\Http\Models\BlogTranslation';
    protected $translatedAttributes = ['title', 'description', 'slug']; 

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
