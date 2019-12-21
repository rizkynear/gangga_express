<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\ThirdSection;
use App\Http\Requests\ThirdSectionEditImage;
use App\Http\Requests\ThirdSectionSave;

class DashboardThirdSectionController extends Controller
{
    const WIDTH  = 400; 
    const HEIGHT = 400;

    public function setCropBox(Request $request)
    {
        return response()->json(['width' => self::WIDTH, 'height' => self::HEIGHT]);
    }

    public function save(ThirdSectionSave $request)
    {
        $thirdSection = new ThirdSection();

        $thirdSection->updateOrCreate([
            'id' => 1
        ], [
            'en' => ['title' => $request->third_section_title_en, 'sub_title' => $request->third_section_sub_title_en, 'content' => $request->third_section_content_en],
            'id' => ['title' => $request->third_section_title_id, 'sub_title' => $request->third_section_sub_title_id, 'content' => $request->third_section_content_id],
        ]);

        return redirect()->back()->with('third-section-success', 'Data Successfully Saved');
    }

    public function editImage(ThirdSectionEditImage $request)
    {
        $thirdSection  = new ThirdSection();
        $record        = ThirdSection::first();
        $name          = Str::random(40) . '.' . $request->image->getClientOriginalExtension();
        
        if (is_null($record)) {
            $thirdSection->storeImage($request, $name, self::WIDTH, self::HEIGHT);

            $thirdSection->create(['image' => $name]);
        } else {
            $thirdSection->storeImage($request, $name, self::WIDTH, self::HEIGHT);
            $thirdSection->deleteImage($record->image);
            
            $record->update(['image' => $name]);
        }

        return redirect()->back()->with('third-section-success', 'Image Successfully Updated');
    }
}
