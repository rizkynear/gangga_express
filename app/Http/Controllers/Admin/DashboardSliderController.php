<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderEdit;
use App\Http\Requests\SliderStore;
use App\Http\Models\Slider;
use Illuminate\Support\Str;

class DashboardSliderController extends Controller
{
    const WIDTH  = 1920;
    const HEIGHT = 1080;

    public function setCropBox(Request $request)
    {
        return response()->json(['width' => self::WIDTH, 'height' => self::HEIGHT]);
    }

    public function store(SliderStore $request)
    {
        $slider   = new Slider();
        $position = Slider::all()->count() + 1;
        $name     = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $slider->storeImage($request, $name, self::WIDTH, self::HEIGHT);
        $slider->image    = $name;
        $slider->position = $position;
        $slider->save();

        return redirect()->back()->with('slider-success', 'New Data Successfully Added');
    }
    
    public function edit(SliderEdit $request, Slider $slider)
    {
        $sliderModel = new Slider();
        $name   = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $sliderModel->deleteImage($slider->image);
        $sliderModel->storeImage($request, $name, self::WIDTH, self::HEIGHT);

        $slider->update(['image' => $name]);

        return redirect()->back()->with('slider-success', 'Data Successfully Updated');
    }

    public function delete(Slider $slider)
    {
        $sliders = Slider::all();

        foreach ($sliders as $slide) {
            if ($slide->position > $slider->position) {
                $slide->position -= 1;
                $slide->save();
            }
        }

        $sliderModel = new Slider();

        $sliderModel->deleteImage($slider->image);
        $slider->delete();

        return redirect()->back()->with('slider-success', 'Data Successfully Deleted');
    }

    public function up(Request $request)
    {
        $recordUp = Slider::findOrFail($request->id);

        if ($recordUp->position > 1) {
            $recordUp->position -= 1;
            $recordUp->save();

            $recordDown = Slider::where('position', '=', $recordUp->position)->where('id', '!=', $recordUp->id)->first();
            $recordDown->position += 1;
            $recordDown->save();
        }
        
        return redirect()->back()->with('slider-success', 'Data Successfully Updated');
    }

    public function down(Request $request)
    {
        $recordDown = Slider::findOrFail($request->id);
        $records    = Slider::all()->count();
        
        if ($recordDown->position < $records) {
            $recordDown->position += 1;
            $recordDown->save();

            $recordUp = Slider::where('position', '=', $recordDown->position)->where('id', '!=', $recordDown->id)->first();
            $recordUp->position -= 1;
            $recordUp->save();
        }
        
        return redirect()->back()->with('slider-success', 'Data Successfully Updated');
    }
}
