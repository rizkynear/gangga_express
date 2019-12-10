<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Blog;
use App\Http\Requests\BlogStore;
use App\Http\Requests\BlogUpdate;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all()->sortByDesc('id');

        return view('admin.blog.index')->with(compact('blogs'));
    }

    public function showAddForm()
    {
        return view('admin.blog.add');
    }

    public function store(BlogStore $request)
    {
        $blog = new Blog();
        $name = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

        $blog->storeImage($request, $name);

        $blog->create([
            'image' => $name,
            'en'    => ['title' => $request->title_en, 'description' => $request->description_en],
            'id'    => ['title' => $request->title_id, 'description' => $request->description_id]
        ]);

        return redirect(route('blog'))->with('success', 'New Data Successfully Added!!');
    }

    public function delete(Blog $blog)
    {
        $blogModel = new Blog();

        $blogModel->deleteImage($blog->image);

        $blog->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted!!');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit')->with(compact('blog'));
    }

    public function update(BlogUpdate $request, Blog $blog)
    {
        $blogModel = new Blog();

        if ($request->hasFile('image')) {
            $name = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

            $blogModel->deleteImage($blog->image);
            $blogModel->storeImage($request, $name);

            $blog->update(['image' => $name]);
        }

        $blog->update([
            'en' => ['title' => $request->title_en, 'description' => $request->description_en],
            'id' => ['title' => $request->title_id, 'description' => $request->description_id]
        ]);

        return redirect(route('blog'))->with('success', 'Data Successfully Updated!!');
    }
}
