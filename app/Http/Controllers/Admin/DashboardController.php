<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\SecondSection;
use App\Http\Models\Slider;
use App\Http\Models\Testimonial;
use App\Http\Requests\SecondSectionSave;
use App\Http\Requests\SliderEdit;
use App\Http\Requests\SliderStore;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $sliders       = Slider::all()->sortBy('position');
        $secondSection = SecondSection::find(1);
        $testimonials  = Testimonial::all();

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

    public function secondSectionUpload(Request $request)
    {
        if ($request->hasFile('upload')) 
        {
            $secondSection = new SecondSection();
            $name = Str::random(40) . '.' . $request->upload->getClientOriginalExtension();

            $secondSection->storeImage($request->upload, $name);
            $secondSection->storeThumbnail($name, 200);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/images/second-sections/thumbnail/' . $name); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }

    public function testimonialStore(testimonialStore $request)
    {
        
    }
}
