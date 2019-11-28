<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Boat;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoatStore;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BoatController extends Controller
{
    public function index()
    {
        $boats = Boat::all();

        return view('admin.boat.index')->with(compact('boats'));
    }

    public function store(BoatStore $request)
    {
        $boat = new Boat();
        $name = Str::random(40) . $request->image->getClientOriginalExtension();

        $boat->storeImage($request->image, $name);
        $boat->storeThumbnail($name, 700);

        $data = [
            'name'     => $request->name,
            'engine'   => $request->engine,
            'capacity' => $request->capacity,
            'length'   => $request->length,
            'width'    => $request->width,
            'image'    => $name
        ];

        $boat->create($data);

        return redirect()->back()->with('success', 'Data Successfully Added');
    }

    public function delete(Request $request)
    {
        $record = Boat::findOrFail($request->id);
        $boat   = new Boat();

        $boat->deleteImage($record->image);
        $record->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted');
    }
}
