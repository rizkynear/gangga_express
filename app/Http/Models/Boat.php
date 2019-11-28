<?php

namespace App\Http\Models;

use App\Traits\ImageHandling;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use ImageHandling;

    protected $fillable = ['name', 'engine', 'capacity', 'length', 'width', 'image'];
    protected $storePath = 'images/boats'; 

    protected function imagePath()
    {
        return public_path('storage/images/boats/');
    }

    protected function thumbnailPath()
    {
        return public_path('storage/images/boats/thumbnail/');
    }

}
