<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\CompanyFirst;
use App\Http\Requests\CompanyFirstEditImage;
use App\Http\Requests\CompanyFirstSave;
use Illuminate\Support\Str;

class CompanyFirstSectionController extends Controller
{
    const WIDTH  = 500;
    const HEIGHT = 400;

    public function setCropBox(Request $request)
    {
        return response()->json(['width' => self::WIDTH, 'height' => self::HEIGHT]);
    }

    public function save(CompanyFirstSave $request)
    {
        $record  = CompanyFirst::first(); 
        $company = new CompanyFirst();

        if (is_null($record)) {
            $company->create([
                'en'    => ['title' => $request->first_title_en, 'sub_title' => $request->first_sub_title_en, 'content' => $request->first_content_en],
                'id'    => ['title' => $request->first_title_id, 'sub_title' => $request->first_sub_title_id, 'content' => $request->first_content_id]
            ]);
        } else {
            $record->update([
                'en' => ['title' => $request->first_title_en, 'sub_title' => $request->first_sub_title_en, 'content' => $request->first_content_en],
                'id' => ['title' => $request->first_title_id, 'sub_title' => $request->first_sub_title_id, 'content' => $request->first_content_id]
            ]);
        }

        return redirect()->back()->with('first-success', 'Data Successfully Saved');
    }

    public function editImage(CompanyFirstEditImage $request)
    {
        $company = new CompanyFirst();
        $record  = CompanyFirst::first();
        $name    = Str::random(40) . '.' . $request->image->getClientOriginalExtension();
        
        if (is_null($record)) {
            $company->storeImage($request, $name, self::WIDTH, self::HEIGHT);

            $company->create(['image' => $name]);
        } else {
            $company->storeImage($request, $name, self::WIDTH, self::HEIGHT);
            $company->deleteImage($record->image);

            $record->update(['image' => $name]);
        }

        return redirect()->back()->with('first-success', 'Image Successfully Updated');
    }
}
