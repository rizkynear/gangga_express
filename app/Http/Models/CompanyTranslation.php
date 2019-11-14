<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyTranslation extends Model
{
    public $timestamps  = false;
    protected $fillable = ['title', 'sub_title', 'content']; 
}
