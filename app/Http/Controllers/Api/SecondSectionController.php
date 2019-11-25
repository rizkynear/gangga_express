<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\SecondSection;
use App\Http\Resources\SecondSectionCollection;

class SecondSectionController extends Controller
{
    public function show()
    {
        return new SecondSectionCollection(SecondSection::all());
    }
}
