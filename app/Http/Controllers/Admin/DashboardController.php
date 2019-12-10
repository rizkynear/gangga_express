<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Booking;
use App\Http\Models\Contact;
use App\Http\Models\SecondSection;
use App\Http\Models\Slider;
use App\Http\Models\Testimonial;
use App\Http\Requests\SecondSectionEditImage;
use App\Http\Requests\SecondSectionSave;
use App\Http\Requests\SliderEdit;
use App\Http\Requests\SliderStore;
use App\Http\Requests\TestimonialUpdate;
use App\Http\Requests\TestimonialStore;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $sliders       = Slider::all()->sortBy('position');
        $secondSection = SecondSection::first();
        $testimonials  = Testimonial::all()->sortByDesc('id');

        return view('admin.dashboard.index')
                    ->with(compact('sliders'))
                    ->with(compact('secondSection'))
                    ->with(compact('testimonials'));
    }

    public function sliderStore(SliderStore $request)
    {
        $slider   = new Slider();
        $position = Slider::all()->count() + 1;
        $name     = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $slider->storeImage($request, $name);
        $slider->image    = $name;
        $slider->position = $position;
        $slider->save();

        return redirect()->back()->with('slider-success', 'New Data Successfully Added');
    }
    
    public function sliderEdit(SliderEdit $request, Slider $slider)
    {
        $slide = new Slider();
        $name   = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $slide->deleteImage($slider->image);
        $slide->storeImage($request, $name);

        $slider->update(['image' => $name]);

        return redirect()->back()->with('slider-success', 'Data Successfully Updated');
    }

    public function sliderDelete(Slider $slider)
    {
        $sliders = Slider::all();

        foreach ($sliders as $slider) {
            if ($slider->position > $slider->position) {
                $slider->position -= 1;
                $slider->save();
            }
        }

        $slide = new Slider();

        $slide->deleteImage($slider->image);
        $slider->delete();

        return redirect()->back()->with('slider-success', 'Data Successfully Deleted');
    }

    public function sliderUp(Request $request)
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

    public function sliderDown(Request $request)
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

    public function secondSectionSave(SecondSectionSave $request)
    {
        $secondSection = new SecondSection();

        $secondSection->updateOrCreate([
            'id' => 1
        ], [
            'en' => ['title' => $request->title_en, 'sub_title' => $request->sub_title_en, 'content' => $request->content_en],
            'id' => ['title' => $request->title_id, 'sub_title' => $request->sub_title_id, 'content' => $request->content_id],
        ]);

        return redirect()->back()->with('second-section-success', 'Data Successfully Saved');
    }

    public function secondSectionEditImage(SecondSectionEditImage $request)
    {
        $secondSection = new SecondSection();
        $record        = SecondSection::first();
        $name          = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $secondSection->storeImage($request, $name);

        if (is_null($record)) {
            if ($request->image_index === 'image_1') {
                $secondSection->create(['image_1' => $name]);
            } else {
                $secondSection->create(['image_2' => $name]);
            }
        } else {
            if ($request->image_index === 'image_1') {
                $record->update(['image_1' => $name]);
            } else {
                $record->update(['image_2' => $name]);
            }
        }

        return redirect()->back()->with('second-section-success', 'Image Successfully Updated');
    }

    public function testimonialStore(TestimonialStore $request)
    {
        $testimonial = new Testimonial();
        $name        = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $testimonial->storeImage($request, $name);
        
        $data = [
            'name'        => $request->name,
            'nationality' => $request->nationality,
            'image'       => $name,
            'en'          => ['description' => $request->description_en],
            'id'          => ['description' => $request->description_id]
        ];

        $testimonial->create($data);

        return redirect()->back()->with('testimonial-success', 'New Data Successfully Added!!');
    }

    public function testimonialEdit(Testimonial $testimonial)
    {
        return view('admin.dashboard.testimonial-edit')->with(compact('testimonial'));
    }

    public function testimonialUpdate(TestimonialUpdate $request, Testimonial $testimonial)
    {   
        $testimoni = new Testimonial();

        if ($request->hasFile('image'))
        {
            $name = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

            $testimoni->deleteImage($testimonial->image);
            $testimoni->storeImage($request, $name);

            $testimonial->update(['image' => $name]);
        }

        $data = [
            'name'        => $request->name,
            'nationality' => $request->nationality,
            'en'          => ['description' => $request->description_en],
            'id'          => ['description' => $request->description_id]
        ];

        $testimonial->update($data);

        return redirect(route('dashboard'))->with('testimonial-success', 'Data Successfully Updated!!');;
    }

    public function testimonialDelete(Testimonial $testimonial)
    {
        $testimoni = new Testimonial();

        $testimoni->deleteImage($testimonial->image);
        $testimonial->delete();

        return redirect()->back()->with('testimonial-success', 'Data Successfully Deleted!!');;
    }

    public function notification(Request $request)
    {
        $inquiry = Booking::where('read_status', '=', 0)->count();
        $contact = Contact::where('read_status', '=', 0)->count();
        
        return response()->json(['inquiry' => $inquiry, 'contact' => $contact]);
    }
}