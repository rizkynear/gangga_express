<?php

namespace App\Http\Models;

use App\Traits\ImageHandling;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use ImageHandling;

    protected $fillable  = ['name', 'location', 'image', 'longitude', 'latitude'];
    protected $storePath = 'images/destinations';

    protected function imagePath()
    {
        return public_path('storage/images/destinations/');
    }

    protected function thumbnailPath() 
    { 
        return public_path('storage/images/destinations/thumbnail/');
    }
}
