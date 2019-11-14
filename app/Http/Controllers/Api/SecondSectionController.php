<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\SecondSection;

class SecondSectionController extends Controller
{
    public function showAll()
    {
        return new SecondSectionCollection(SecondSection::all());
    }

    public function showOne(SecondSection $secondSection)
    {
        return new SecondSectionResource($secondSection);
    }
}
