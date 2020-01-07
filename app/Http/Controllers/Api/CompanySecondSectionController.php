<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\CompanySecond;
use App\Http\Resources\CompanySecondSectionCollection;

class CompanySecondSectionController extends Controller
{
    public function show()
    {
        return new CompanySecondSectionCollection(CompanySecond::all());
    }
}
