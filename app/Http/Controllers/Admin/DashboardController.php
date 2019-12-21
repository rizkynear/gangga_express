<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use App\Http\Models\Contact;
use App\Http\Models\SecondSection;
use App\Http\Models\Slider;
use App\Http\Models\Testimonial;
use App\Http\Models\ThirdSection;

class DashboardController extends Controller
{
    public function index()
    {
        $sliders       = Slider::all()->sortBy('position');
        $secondSection = SecondSection::first();
        $thirdSection  = ThirdSection::first();
        $testimonials  = Testimonial::all()->sortByDesc('id');

        return view('admin.dashboard.index')
                    ->with(compact('sliders'))
                    ->with(compact('secondSection'))
                    ->with(compact('thirdSection'))
                    ->with(compact('testimonials'));
    }

    public function notification(Request $request)
    {
        $inquiry = Booking::where('read_status', '=', 0)->count();
        $contact = Contact::where('read_status', '=', 0)->count();
        
        return response()->json(['inquiry' => $inquiry, 'contact' => $contact]);
    }
}