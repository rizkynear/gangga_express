<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use App\Http\Models\BookingSchedule;
use App\Http\Models\Route;
use App\Http\Models\Schedule;
use App\Http\Resources\ScheduleCollection;

class BookingController extends Controller
{
    public function search(Request $request)
    {
        $schedules = Schedule::where('route', $request->route);

        return new ScheduleCollection($schedules->get());
    }
}
