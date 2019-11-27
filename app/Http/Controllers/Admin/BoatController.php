<?php

namespace App\Http\Controllers;

use App\Http\Models\Boat;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    public function index()
    {
        $boats = Boat::all();

        return view('admin.boat.index')->with(compact('boats'));
    }
}
