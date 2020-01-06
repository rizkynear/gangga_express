<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\CompanyFirst;
use App\Http\Models\CompanySecond;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companyFirst  = CompanyFirst::first();
        $companySecond = CompanySecond::first(); 

        return view('admin.company.index')->with(compact('companyFirst'))->with(compact('companySecond'));
    }
}
