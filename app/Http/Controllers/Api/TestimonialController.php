<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\Testimonial;
use App\Http\Resources\TestimonialCollection;
use App\Http\Resources\TestimonialResource;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function showAll()
    {
        return new TestimonialCollection(Testimonial::all());
    }

    public function showOne(Testimonial $testimonial)
    {
        return new TestimonialResource($testimonial);
    }
}
