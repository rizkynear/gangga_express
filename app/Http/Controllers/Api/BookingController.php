<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Holiday;
use App\Http\Models\Schedule;
use App\Http\Resources\DepartureCollection;
use App\Http\Resources\DepartureResource;
use App\Http\Resources\HolidayCollection;
use App\Http\Resources\ReturnCollection;
use App\Http\Resources\ReturnResource;

class BookingController extends Controller
{
    public function departure(Request $request)
    {
        if ($request->has('departure_route')) {
            $departure = Schedule::where('route', '=', $request->departure_route);
        }

        if ($request->has('departure_date')) {
            $departure->where('expired_date', '>', $request->departure_date);
        }

        return new DepartureCollection($departure->get());
    }
    
    public function return(Request $request)
    {
        if ($request->has('return_route')) {
            $return = Schedule::where('route', '=', $request->return_route);
        }

        if ($request->has('return_date')) {
            $return->where('expired_date', '>', $request->return_date);
        }

        return new ReturnCollection($return->get());
    }

    public function holiday()
    {
        return new HolidayCollection(Holiday::all());
    }
}
