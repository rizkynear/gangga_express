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
        
        $destination->storeImage($request->image, $name);
        $destination->storeThumbnail($name, 250);

        $data = [
            'name'      => $request->name,
            'location'  => $request->location,
            'longitude' => $request->longitude,
            'latitude'  => $request->latitude,
            'image'     => $name
        ];

        $destination->create($data);

        return redirect(route('destination'))->with('success', 'New Data Successfully Added!!');
    }

    public function delete($id)
    {
        $destination = new Destination();
        $record      = Destination::findOrFail($id);

        $destination->deleteImage($record->image);
        
        $record->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted!!');
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        
        return view('admin.destination.edit')->with(compact('destination'));
    }

    public function update(DestinationUpdate $request, $id)
    {
        $destination = new Destination();
        $record      = Destination::findOrFail($id);

        if ($request->hasFile('image')) {
            $name = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

            $destination->deleteImage($record->image);
            $destination->storeImage($request->image, $name);
            $destination->storeThumbnail($name, 250);

            $record->update(['image' => $name]);
        }

        $data = [
            'name'      => $request->name,
            'location'  => $request->location,
            'longitude' => $request->longitude,
            'latitude'  => $request->latitude
        ];

        $record->update($data);

        return redirect(route('destination'))->with('success', 'Data Successfully Updated!!');
    }
}
