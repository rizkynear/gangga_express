<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'description']; 
}
