<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Route;
use App\Http\Requests\ScheduleStore;
use App\Http\Requests\ScheduleUpdate;

class ScheduleController extends Controller
{
    public function index(Route $route)
    {
        $route->with('schedules');

        return view('admin.schedule.index')->with(compact('route'));
    }

    public function store(ScheduleStore $request, Route $route)
    {
        $data = [
            'departure'    => $request->departure,
            'arrival'      => $request->arrival,
            'quota'        => $request->quota,
            'expired_date' => $request->expired_date
        ];

        $route->schedules()->create($data);

        return redirect()->back()->with('success', 'New Data Successfully Added');
    }

    public function delete(Route $route, $id)
    {
        $schedule = $route->schedules()->findOrFail($id);

        $schedule->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted');
    }

    public function edit(Route $route, $id)
    {
        $schedule = $route->schedules()->findOrFail($id);

        return view('admin.schedule.edit')->with(compact('schedule'));
    }

    public function update(ScheduleUpdate $request, Route $route, $id)
    {
        $record = $route->schedules()->findOrFail($id);

        $data = [
            'departure'    => $request->departure,
            'arrival'      => $request->arrival,
            'quota'        => $request->quota,
            'expired_date' => $request->expired_date
        ];

        $record->update($data);

        return redirect(route('route', $route->route))->with('success', 'Data Successfully Updated!!');
    }
}
