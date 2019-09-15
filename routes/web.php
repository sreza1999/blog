<?php

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


use App\Category;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::paginate(5);
    $categories = Category::all();
    return view('layouts.index', compact('posts', 'categories'));
});
Route::get('/post/{id}', 'AdminPostController@post')->name('post');

Route::group(['middleware' => 'admin'], function () {
    Route::resource('admin/users', 'AdminUserController');
    Route::resource('admin/posts', 'AdminPostController');
    Route::resource('admin/category', 'AdminCategoryController');
    Route::resource('admin/media', 'MediaController');
    Route::resource('admin/comment', 'AdminCommentController');
    Route::resource('admin/dashboard', 'dashboardController');
    Route::resource('admin/comment/replies', 'AdminCommentRepliesController');
    Route::get('/admin', function () {
        return view('layouts.admin');
    });

});

//Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create', 'AdminUserController@store')->name('create');
Route::get('/category/{id}', 'AdminPostController@category')->name('category');
Auth::routes();


