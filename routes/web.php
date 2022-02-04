<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
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

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::resource('posts', PostController::class);
Route::get('posts/{post:slug}', [PostController::class, 'show'])
    ->name('posts.show');

//Route::get('/authors', function () {
//    return view('authors', [
//        "title" => 'Post Authors',
//        "authors" => Author::all()
//    ]);
//});

Route::prefix('/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])
        ->name('categories.index');
    Route::get('/{category:slug}', [CategoryController::class, 'show'])
        ->name('categories.show');
});

Route::resource('authors', AuthorController::class);
Route::get('authors/{author:username}', [AuthorController::class, 'show'])
    ->name('authorss.show');

//Route::get('/authors/{author:username}', function (User $author) {
//    return view('posts', [
//        'title' => "Post By Author : $author->name",
//        "active" => 'author',
//        'posts' => $author->posts->load('category', 'author'),
//    ]);
//});

//Route::get('/authors', function () {
//    return view('author', [
//        "title" => 'Author',
//
//    ]);
//});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Fauzan Alghifari",
        "email" => "fauzanalghifari007@gmail.com",
        "image" => "avatar.png"
    ]);
});

Route::get('/kuis1', function () {
    return view('kuis1', [
        "title" => "Kuis 1",
    ]);
});

Route::get('/kuis2', function () {
    return view('kuis2', [
        "title" => "Kuis 2"
    ]);
});

Route::get('/kuis3', function () {
    return view('kuis3', [
        "title" => "Kuis 3"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'verification']);
Route::post('/logout', [LoginController::class, 'logout']);
//
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'save']);
//
Route::get('/dashboard', function(){
    return view ('dashboard.index');
})->middleware('auth');
//
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
//
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')
->middleware('admin');
