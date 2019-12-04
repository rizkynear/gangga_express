<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\Blog;
use App\Http\Models\BlogTranslation;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showAll()
    {
        return new BlogCollection(Blog::all()->sortByDesc('created_at'));
    }

    public function showOne(BlogTranslation $blog)
    {
        $blog = Blog::find($blog->blog_id);

        return new BlogResource($blog);
    }

    public function latest() 
    {
        $blogs = Blog::all()->sortByDesc('id')->take(3);

        return new BlogCollection($blogs);
    }
}
