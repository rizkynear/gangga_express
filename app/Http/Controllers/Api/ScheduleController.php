<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Route;
use App\Http\Resources\RouteCollection;

class ScheduleController extends Controller
{
    public function show()
    {
        return new RouteCollection(Route::all());
    }
}
