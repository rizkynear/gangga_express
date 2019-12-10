<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Holiday;
use App\Http\Requests\HolidayStore;
use App\Http\Requests\HolidayUpdate;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::all();

        return view('admin.holiday.index')->with(compact('holidays'));
    }

    public function store(HolidayStore $request)
    {
        $holiday = new Holiday();

        $holiday->create([
            'name' => $request->name,
            'date' => $request->date
        ]);

        return redirect()->back()->with('success', 'New Data Successfully Added!!');
    }

    public function delete(Holiday $holiday)
    {
        $holiday->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted!!');
    }

    public function edit(Holiday $holiday)
    {
        return view('admin.holiday.edit')->with(compact('holiday'));
    }

    public function update(HolidayUpdate $request, Holiday $holiday)
    {
        $holiday->update([
            'name' => $request->name,
            'date' => $request->date
        ]);

        return redirect(route('holiday'))->with('success', 'Data Successfully Updated!!');
    }
}
