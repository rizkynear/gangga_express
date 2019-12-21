<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\SecondSection;
use App\Http\Requests\SecondSectionEditImage;
use App\Http\Requests\SecondSectionSave;
use Illuminate\Support\Str;

class DashboardSecondSectionController extends Controller
{
    const LARGEWIDTH  = 600; 
    const LARGEHEIGHT = 600;
    const SMALLWIDTH  = 300;
    const SMALLHEIGHT = 300;

    public function setCropBox(Request $request)
    {
        if ($request->image_index == 'image_1') {
            return response()->json(['width' => self::LARGEWIDTH, 'height' => self::LARGEHEIGHT]);
        }
        
        return response()->json(['width' => self::SMALLWIDTH, 'height' => self::SMALLHEIGHT]);
    }

    public function save(SecondSectionSave $request)
    {
        $secondSection = new SecondSection();

        $secondSection->updateOrCreate([
            'id' => 1
        ], [
            'en' => ['title' => $request->second_section_title_en, 'sub_title' => $request->second_section_sub_title_en, 'content' => $request->second_section_content_en],
            'id' => ['title' => $request->second_section_title_id, 'sub_title' => $request->second_section_sub_title_id, 'content' => $request->second_section_content_id],
        ]);

        return redirect()->back()->with('second-section-success', 'Data Successfully Saved');
    }

    public function editImage(SecondSectionEditImage $request)
    {
        $secondSection = new SecondSection();
        $record        = SecondSection::first();
        $name          = Str::random(40) . '.' . $request->image->getClientOriginalExtension();
        
        if (is_null($record)) {
            if ($request->image_index === 'image_1') {
                $secondSection->storeImage($request, $name, self::LARGEWIDTH, self::LARGEHEIGHT);

                $secondSection->create(['image_1' => $name]);
            } else {
                $secondSection->storeImage($request, $name, self::SMALLWIDTH, self::SMALLHEIGHT);

                $secondSection->create(['image_2' => $name]);
            }
        } else {
            if ($request->image_index === 'image_1') {
                $secondSection->storeImage($request, $name, self::LARGEWIDTH, self::LARGEHEIGHT);
                $secondSection->deleteImage($record->image_1);
                
                $record->update(['image_1' => $name]);
            } else {
                $secondSection->storeImage($request, $name, self::SMALLWIDTH, self::SMALLHEIGHT);
                $secondSection->deleteImage($record->image_2);

                $record->update(['image_2' => $name]);
            }
        }

        return redirect()->back()->with('second-section-success', 'Image Successfully Updated');
    }
}
