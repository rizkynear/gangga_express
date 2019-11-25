<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Holiday;
use App\Http\Models\Schedule;
use App\Http\Resources\DepartureResource;
use App\Http\Resources\HolidayCollection;
use App\Http\Resources\ReturnResource;

class BookingController extends Controller
{
    public function search(Request $request)
    {
        $departure = null;
        $return    = null;

        if ($request->has('departure_route')) {
            $departure = Schedule::where('route', '=', $request->departure_route)->get();
        }

        if ($request->has('return_route')) {
            $return = Schedule::where('route', '=', $request->return_route)->get();
        }

        return [
            'data' => [
                'departure' => DepartureResource::collection($departure),
                'return'    => is_null($return) ? null : ReturnResource::collection($return)
            ]
        ];
    }

    public function holiday()
    {
        return new HolidayCollection(Holiday::all());
    }
}
