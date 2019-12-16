<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Destination;
use App\Http\Requests\DestinationStore;
use App\Http\Requests\DestinationUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    const width  = 400;
    const height = 300;

    public function setCropBox(Request $request)
    {
        return response()->json(['width' => self::width, 'height' => self::height]);
    }

    public function index()
    {
        $destinations = Destination::all()->sortByDesc('id');

        return view('admin.destination.index')->with(compact('destinations'));
    }

    public function add()
    {
        return view('admin.destination.add');
    }

    public function store(DestinationStore $request)
    {
        $destination = new Destination();
        $name        = Str::random(40) . '.' . $request->image->getClientOriginalExtension();
        
        $destination->storeImage($request, $name, self::width, self::height);

        $destination->create([
            'name'      => $request->name,
            'location'  => $request->location,
            'longitude' => $request->longitude,
            'latitude'  => $request->latitude,
            'image'     => $name
        ]);

        return redirect(route('destination'))->with('success', 'New Data Successfully Added!!');
    }

    public function delete(Destination $destination)
    {
        $destinationModel = new Destination();

        $destinationModel->deleteImage($destination->image);
        
        $destination->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted!!');
    }

    public function edit(Destination $destination)
    {   
        return view('admin.destination.edit')->with(compact('destination'));
    }

    public function update(DestinationUpdate $request, Destination $destination)
    {
        $destinationModel = new Destination();

        if ($request->hasFile('image')) {
            $name = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

            $destinationModel->deleteImage($destination->image);
            $destinationModel->storeImage($request, $name, self::width, self::height);

            $destination->update(['image' => $name]);
        }

        $destination->update([
            'name'      => $request->name,
            'location'  => $request->location,
            'longitude' => $request->longitude,
            'latitude'  => $request->latitude
        ]);

        return redirect(route('destination'))->with('success', 'Data Successfully Updated!!');
    }
}
