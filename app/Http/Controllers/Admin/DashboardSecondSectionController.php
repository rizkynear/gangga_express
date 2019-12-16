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
    const largeWidth  = 600; 
    const largeHeight = 600;
    const smallWidth  = 300;
    const smallHeight = 300;

    public function setCropBox(Request $request)
    {
        if ($request->image_index == 'image_1') {
            return response()->json(['width' => self::largeWidth, 'height' => self::largeHeight]);
        }
        
        return response()->json(['width' => self::smallWidth, 'height' => self::smallHeight]);
    }

    public function save(SecondSectionSave $request)
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

    public function editImage(SecondSectionEditImage $request)
    {
        $secondSection = new SecondSection();
        $record        = SecondSection::first();
        $name          = Str::random(40) . '.' . $request->image->getClientOriginalExtension();
        
        if (is_null($record)) {
            if ($request->image_index === 'image_1') {
                $secondSection->storeImage($request, $name, self::largeWidth, self::largeHeight);

                $secondSection->create(['image_1' => $name]);
            } else {
                $secondSection->storeImage($request, $name, self::smallWidth, self::smallHeight);

                $secondSection->create(['image_2' => $name]);
            }
        } else {
            if ($request->image_index === 'image_1') {
                $secondSection->storeImage($request, $name, self::largeWidth, self::largeHeight);
                $secondSection->deleteImage($record->image_1);
                
                $record->update(['image_1' => $name]);
            } else {
                $secondSection->storeImage($request, $name, self::smallWidth, self::smallHeight);
                $secondSection->deleteImage($record->image_2);

                $record->update(['image_2' => $name]);
            }
        }

        return redirect()->back()->with('second-section-success', 'Image Successfully Updated');
    }
}
