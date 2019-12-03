<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Holiday;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::all();

        return view('admin.holiday.index')->with(compact('holidays'));
    }
}
