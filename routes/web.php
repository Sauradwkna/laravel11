<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Sakura', 'title' => 'About Page']);
});

Route::get('/posts', function () {
    $posts = Post::with(['author', 'category'])->latest()->get();
    return view('posts', ['title' => 'Blog Page', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) { // route model binding
    
    // $post = Post::find($id);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) { // route model binding
    return view('posts', ['title' => count($user->posts) . ' Article by ' . $user->name, 
    'posts' => $user->posts]);

    // $posts = $user->posts->load('category', 'author');
    // return view('posts', ['title' => count($posts) . ' Article by ' . $user->name, 
    // 'posts' => $posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) { // route model binding
    return view('posts', ['title' => 'Article in: ' . $category->name, 'posts' => $category->posts]);

    // $posts = $category->posts->load('category', 'author');
    // return view('posts', ['title' => 'Article in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['account' => '@'.'sakurara','title' => 'Contact Page']);
});
