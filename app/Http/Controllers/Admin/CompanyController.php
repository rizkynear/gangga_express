<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Company;
use App\Http\Requests\CompanySave;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all()->first();

        return view('admin.company.index')->with(compact('company'));
    }

    public function save(CompanySave $request)
    {
        $record  = Company::first(); 
        $company = new Company();

        if (is_null($record)) {
            $company->create([
                'en' => ['title' => $request->title_en, 'sub_title' => $request->sub_title_en, 'content' => $request->content_en],
                'id' => ['title' => $request->title_id, 'sub_title' => $request->sub_title_id, 'content' => $request->content_id]
            ]);
        } else {
            $record->update([
                'en' => ['title' => $request->title_en, 'sub_title' => $request->sub_title_en, 'content' => $request->content_en],
                'id' => ['title' => $request->title_id, 'sub_title' => $request->sub_title_id, 'content' => $request->content_id]
            ]);
        }

        return redirect()->back()->with('success', 'Data Successfully Saved');
    }
}
