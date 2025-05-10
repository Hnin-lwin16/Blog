<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    DB::listen(function($query){
        logger($query->sql);
    });
    return view('blogs',[
        // 'blogs'=> Blog::with('category','author')->get()
        'blogs'=> Blog::latest()->get()
    ]);
});
Route::get('/blogs/{blog:slug}', function (Blog $blog)//blog::FindOrFail($slug) 
{
    // $blog = Blog::find($slug);
   
    return view("blog",[
        'blog'=> $blog
    ]);
})->where('blog','[A-z\d\-_]+');

Route::get('/categories/{category:slug}',function(Category $category){
    return view('blogs',[
        // 'blogs'=> $category->blogs->load('author','category')
         'blogs'=> $category->blogs
    ]);
});

Route::get('/users/{user:username}',function(User $user){
    return view('blogs',[
        // 'blogs'=>$user->blogs->load('author','category')
         'blogs'=>$user->blogs
    ]);
});