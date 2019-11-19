<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class BlogTranslation extends Model
{
    use HasSlug;

    public $timestamps = false;
    protected $fillable = ['title', 'description', 'slug']; 

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }
}
