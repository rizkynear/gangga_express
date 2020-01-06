<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\CompanySecond;
use App\Http\Requests\CompanySecondEditImage;
use App\Http\Requests\CompanySecondSave;
use Illuminate\Support\Str;

class CompanySecondSectionController extends Controller
{
    const WIDTH  = 1110;
    const HEIGHT = 400;

    public function setCropBox(Request $request)
    {
        return response()->json(['width' => self::WIDTH, 'height' => self::HEIGHT]);
    }
    
    public function save(CompanySecondSave $request)
    {
        $record  = CompanySecond::first(); 
        $company = new CompanySecond();

        if (is_null($record)) {
            $company->create([
                'en' => ['title' => $request->second_title_en, 'sub_title' => $request->second_sub_title_en, 'content' => $request->second_content_en],
                'id' => ['title' => $request->second_title_id, 'sub_title' => $request->second_sub_title_id, 'content' => $request->second_content_id]
            ]);
        } else {
            $record->update([
                'en' => ['title' => $request->second_title_en, 'sub_title' => $request->second_sub_title_en, 'content' => $request->second_content_en],
                'id' => ['title' => $request->second_title_id, 'sub_title' => $request->second_sub_title_id, 'content' => $request->second_content_id]
            ]);
        }

        return redirect()->back()->with('second-success', 'Data Successfully Saved');
    }

    public function editImage(CompanySecondEditImage $request)
    {
        $company = new CompanySecond();
        $record  = CompanySecond::first();
        $name    = Str::random(40) . '.' . $request->image->getClientOriginalExtension();
        
        if (is_null($record)) {
            $company->storeImage($request, $name, self::WIDTH, self::HEIGHT);

            $company->create(['image' => $name]);
        } else {
            $company->storeImage($request, $name, self::WIDTH, self::HEIGHT);
            $company->deleteImage($record->image);

            $record->update(['image' => $name]);
        }

        return redirect()->back()->with('second-success', 'Image Successfully Updated');
    }
}
