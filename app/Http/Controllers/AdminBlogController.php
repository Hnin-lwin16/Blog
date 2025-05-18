<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index(){
        return view('admin.blogs.index',[
            'blogs'=> Blog::latest()->paginate(1)
        ]);
    }
    public function create(){
    
    return view('admin.blogs.create',[
        'categories'=> Category::all()
    ]);
}
public function store(){
    
    $formData = request()->validate([
        "title" => ['required'],
        'slug'=>['required',Rule::unique('blogs','slug')],
  "intro" => ['required'],
  "body" => ['required'],
  "category_id" => ['required',Rule::exists('categories','id')]

    ]);
   $formData['user_id']=auth()->id();
   $path = request('thumbnail')->store('thumbnails');
   $formData['thumbnail'] = $path;
   Blog::create($formData);

   return redirect('/');
}
public function destroy(Blog $blog){
    $blog->delete();
    return back();
}
public function edit(Blog $blog){
    return view('admin.blogs.edit',[
        'categories'=>Category::all(),
        'blog'=>$blog
    ]);
}
public function update(Blog $blog){
     $formData = request()->validate([
        "title" => ['required'],
        'slug'=>['required',Rule::unique('blogs','slug')->ignore($blog->id)],
  "intro" => ['required'],
  "body" => ['required'],
  "category_id" => ['required',Rule::exists('categories','id')]

    ]);
   $formData['user_id']=auth()->id();
   $path = request('thumbnail')? request('thumbnail')->store('thumbnails') : $blog->thumbnail;
   $formData['thumbnail'] = $path;
    $blog->update($formData);
    return redirect('/admin/blogs');
}
}
