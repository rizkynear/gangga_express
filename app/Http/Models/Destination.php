<?php

namespace App\Http\Models;

use App\Traits\DeleteImage;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MakeImageFolder;
use App\Traits\StoreImage;

class Destination extends Model
{
    use MakeImageFolder, DeleteImage, StoreImage;

    protected $fillable  = ['name', 'location', 'image'];
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
