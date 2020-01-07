<?php

namespace App\Http\Controllers\Api;

use App\Http\Models\ThirdSection;
use App\Http\Resources\ThirdSectionCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThirdSectionController extends Controller
{
    public function show()
    {
        return new ThirdSectionCollection(ThirdSection::all());
    }
}
