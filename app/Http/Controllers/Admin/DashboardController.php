<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\SecondSection;
use App\Http\Models\Slider;
use App\Http\Models\Testimonial;

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
}
