<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Boat;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoatStore;
use App\Http\Requests\BoatUpdate;
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

        $boat->storeImage($request, $name);

        $boat->create([
            'name'     => $request->name,
            'engine'   => $request->engine,
            'capacity' => $request->capacity,
            'length'   => $request->length,
            'width'    => $request->width,
            'image'    => $name
        ]);

        return redirect()->back()->with('success', 'Data Successfully Added');
    }

    public function delete(Boat $boat)
    {
        $boatModel   = new Boat();

        $boatModel->deleteImage($boat->image);
        $boat->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted');
    }

    public function edit(Boat $boat)
    {
        return view('admin.boat.edit')->with(compact('boat'));
    }

    public function update(BoatUpdate $request, Boat $boat)
    {
        $boatModel = new Boat();

        if ($request->hasFile('image')) {
            $name = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

            $boatModel->deleteImage($boat->image);
            $boatModel->storeImage($request, $name);

            $boat->update(['image' => $name]);
        }

        $boat->update([
            'name'     => $request->name,
            'engine'   => $request->engine,
            'capacity' => $request->capacity,
            'length'   => $request->length,
            'width'    => $request->width
        ]);

        return redirect(route('boat'))->with('success', 'Data Successfully Updated!!');
    }
}
