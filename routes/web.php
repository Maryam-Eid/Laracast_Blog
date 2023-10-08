<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('posts');
//});
//Route::get('posts/{post:slug}', function (\App\Models\Post $post) {
//    return view('post', [
//        'post' => $post
//    ]);
//});


Route::get('/', function (){
    return view('posts',[
        'posts'=>\App\Models\Post::latest()->get()
    ]);
});

Route::get('posts/{post:slug}', function (\App\Models\Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category}', function (\App\Models\Category $category) {
    return view('posts', [
        'posts' =>$category->posts
    ]);
});

Route::get('authors/{author:username}', function (\App\Models\User $author) {
    return view('posts', [
        'posts' =>$author->posts
    ]);
});



