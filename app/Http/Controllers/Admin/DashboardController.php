<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $secondSection = SecondSection::find(1);
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

        $slider->storeImage($request->image, $name);
        $slider->storeThumbnail($name, 700);
        $slider->image    = $name;
        $slider->position = $position;
        $slider->save();

        return redirect()->back();
    }
    
    public function sliderEdit(SliderEdit $request)
    {
        $slider = new Slider();
        $record = $slider->findOrFail($request->id);
        $name   = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $slider->deleteImage($record->image);
        $slider->storeImage($request->image, $name);
        $slider->storeThumbnail($name, 700);

        $record->update(['image' => $name]);

        return redirect()->back();
    }

    public function sliderDelete(Request $request)
    {
        $record  = Slider::findOrFail($request->id);
        $sliders = Slider::all();

        foreach ($sliders as $slider) {
            if ($slider->position > $record->position) {
                $slider->position -= 1;
                $slider->save();
            }
        }

        $slider = new Slider();
        $slider->deleteImage($record->image);
        $record->delete();

        return redirect()->back();
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
        
        return redirect()->back();
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
        
        return redirect()->back();
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

        return redirect()->back()->with('success', 'Data Successfully Saved');
    }

    public function secondSectionEditImage(SecondSectionEditImage $request)
    {
        $secondSection = new SecondSection();
        $record        = SecondSection::find(1);
        $name          = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $secondSection->storeImage($request->image, $name);
        $secondSection->storeThumbnail($name, 700);

        if ($request->image_index === 'image_1') {
            if (!is_null($record->image_1)) {
                $secondSection->deleteImage($record->image_1);
            }

            $secondSection->updateOrCreate([
                'id' => 1
            ], [
                'image_1' => $name
            ]);
        }

        elseif ($request->image_index === 'image_2') {
            if (!is_null($record->image_2)) {
                $secondSection->deleteImage($record->image_2);
            }

            $secondSection->updateOrCreate([
                'id' => 1
            ], [
                'image_2' => $name
            ]);
        }

        return redirect()->back()->with('Image Successfully Updated');
    }

    public function testimonialStore(TestimonialStore $request)
    {
        $testimonial = new Testimonial();
        $name        = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $testimonial->storeImage($request->image, $name);
        $testimonial->storeThumbnail($name, 700);
        
        $data = [
            'name'        => $request->name,
            'nationality' => $request->nationality,
            'image'       => $name,
            'en'          => ['description' => $request->description_en],
            'id'          => ['description' => $request->description_id]
        ];

        $testimonial->create($data);

        return redirect()->back();
    }

    public function testimonialEdit(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.dashboard.testimonial-edit')->with(compact('testimonial'));
    }

    public function testimonialUpdate(TestimonialUpdate $request, $id)
    {
        $testimonial = new Testimonial();
        $record      = Testimonial::findOrFail($id);
        
        if ($request->hasFile('image'))
        {
            $name = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

            $testimonial->deleteImage($record->image);
            $testimonial->storeImage($request->image, $name);
            $testimonial->storeThumbnail($name, 300);

            $record->update(['image' => $name]);
        }

        $data = [
            'name'        => $request->name,
            'nationality' => $request->nationality,
            'en'          => ['description' => $request->description_en],
            'id'          => ['description' => $request->description_id]
        ];

        $record->update($data);

        return redirect(route('dashboard'));
    }

    public function testimonialDelete(Request $request)
    {
        $testimonial = new Testimonial();
        $record      = Testimonial::findOrFail($request->id);

        $testimonial->deleteImage($record->image);
        $record->delete();

        return redirect()->back();
    }
}
