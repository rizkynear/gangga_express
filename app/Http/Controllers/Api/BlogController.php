<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\Blog;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BlogController extends Controller
{
    public function showAll()
    {
        // App::setLocale($locale);

        return new BlogCollection(Blog::all());
    }

    public function showOne(Blog $blog)
    {
        // App::setLocale($locale);

        return new BlogResource($blog);
    }
}
