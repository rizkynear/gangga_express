<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\CompanyFirst;
use App\Http\Resources\CompanyFirstSectionCollection;

class CompanyFirstSectionController extends Controller
{
    public function show()
    {
        // dd('tes');
        return new CompanyFirstSectionCollection(CompanyFirst::all());
    }
}
