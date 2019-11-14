<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Models\Boat;
use App\Http\Resources\BoatCollection;
use App\Http\Resources\BoatResource;
use App\Http\Controllers\Controller;

class BoatController extends Controller
{
    public function showAll()
    {
        return new BoatCollection(Boat::all());
    }

    public function showOne(Boat $boat)
    {
        return new BoatResource($boat);
    }
}
