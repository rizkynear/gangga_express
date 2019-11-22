<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use App\Http\Models\BookingSchedule;
use App\Http\Models\Route;
use App\Http\Models\Schedule;
use App\Http\Resources\ScheduleCollection;
use App\Http\Resources\ScheduleResource;

class BookingController extends Controller
{
    public function search(Request $request)
    {
        if ($request->has('departure_route')) {
            $departure = Schedule::where('route', '=', $request->departure_route)->get();
        }

        if ($request->has('return_route')) {
            $return = Schedule::where('route', '=', $request->return_route)->get();
        }

        return [
            'data' => [
                'departure' => ScheduleResource::collection($departure),
                'return'    => ScheduleResource::collection($return)
            ]
        ];
    }
}
