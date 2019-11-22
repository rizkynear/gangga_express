<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Destination;
use App\Http\Resources\DestinationCollection;
use App\Http\Resources\DestinationResource;

class DestinationController extends Controller
{
    public function showAll()
    {
        return new DestinationCollection(Destination::all());
    }

    public function showOne(Destination $destination)
    {
        return new DestinationResource($destination);
    }
}
