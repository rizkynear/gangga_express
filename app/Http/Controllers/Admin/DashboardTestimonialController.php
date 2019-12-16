<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Testimonial;
use App\Http\Requests\TestimonialStore;
use Illuminate\Support\Str;

class DashboardTestimonialController extends Controller
{
    const width  = 150;
    const height = 150;

    public function setCropBox(Request $request)
    {
        return response()->json(['width' => self::width, 'height' => self::height]);
    }

    public function store(TestimonialStore $request)
    {
        $testimonial = new Testimonial();
        $name        = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $testimonial->storeImage($request, $name, self::width, self::height);

        $testimonial->create([
            'name'        => $request->name,
            'nationality' => $request->nationality,
            'image'       => $name,
            'en'          => ['description' => $request->description_en],
            'id'          => ['description' => $request->description_id]
        ]);

        return redirect()->back()->with('testimonial-success', 'New Data Successfully Added!!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.dashboard.testimonial-edit')->with(compact('testimonial'));
    }

    public function update(TestimonialUpdate $request, Testimonial $testimonial)
    {   
        $testimonialModel = new Testimonial();

        if ($request->hasFile('image'))
        {
            $name = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

            $testimonialModel->deleteImage($testimonial->image);
            $testimonialModel->storeImage($request, $name, self::width, self::height);

            $testimonial->update(['image' => $name]);
        }

        $testimonial->update([
            'name'        => $request->name,
            'nationality' => $request->nationality,
            'en'          => ['description' => $request->description_en],
            'id'          => ['description' => $request->description_id]
        ]);

        return redirect(route('dashboard'))->with('testimonial-success', 'Data Successfully Updated!!');;
    }

    public function delete(Testimonial $testimonial)
    {
        $testimonialModel = new Testimonial();

        $testimonialModel->deleteImage($testimonial->image);
        $testimonial->delete();

        return redirect()->back()->with('testimonial-success', 'Data Successfully Deleted!!');;
    }
}