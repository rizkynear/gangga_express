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

        $blog->storeImage($request->image, $name);
        $blog->storeThumbnail($name, 250);

        $data = [
            'image' => $name,
            'en'    => ['title' => $request->title_en, 'description' => $request->description_en],
            'id'    => ['title' => $request->title_id, 'description' => $request->description_id]
        ];

        $blog->create($data);

        return redirect(route('blog'))->with('success', 'New Data Successfully Added!!');
    }

    public function delete($id)
    {
        $blog = new Blog();
        $record = Blog::findOrFail($id);

        $blog->deleteImage($record->image);

        $record->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted!!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blog.edit')->with(compact('blog'));
    }

    public function update(BlogUpdate $request, $id)
    {
        $blog   = new Blog();
        $record = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            $name = Str::random(40) . '.' . $request->image->getClientOriginalExtension();

            $blog->deleteImage($record->image);
            $blog->storeImage($request->image, $name);
            $blog->storeThumbnail($name, 250);

            $record->update(['image' => $name]);
        }

        $data = [
            'en' => ['title' => $request->title_en, 'description' => $request->description_en],
            'id' => ['title' => $request->title_id, 'description' => $request->description_id]
        ];

        $record->update($data);

        return redirect(route('blog'))->with('success', 'Data Successfully Updated!!');
    }
}
