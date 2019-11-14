<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Slider;
use App\Http\Resources\SliderCollection;
use App\Http\Resources\SliderResource;

class SliderController extends Controller
{
    public function showAll()
    {
        return new SliderCollection(Slider::all());
    }

    public function showOne(Slider $slider)
    {
        return new SliderResource($slider);
    }
}
