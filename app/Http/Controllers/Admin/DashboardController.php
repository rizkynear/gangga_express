<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\SecondSection;
use App\Http\Models\Slider;
use App\Http\Models\Testimonial;
use App\Http\Requests\SliderStore;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $sliders       = Slider::all()->sortBy('position');
        $secondSection = SecondSection::all()->first();
        $testimonials  = Testimonial::all();

        return view('admin.dashboard.index')
                    ->with(compact('sliders'))
                    ->with(compact('secondSection'))
                    ->with(compact('testimonials'));
    }

    public function sliderStore(SliderStore $request)
    {
        $slider = new Slider();
        $name   = Str::random(40) . '.' . $request->slider_image->getClientOriginalExtension();

        $slider->storeImage($request->slider_image, $name);
        $slider->storeThumbnail($name, 700);
        $slider->image = $name;
        $slider->save();

        return redirect()->back();
    }
}
