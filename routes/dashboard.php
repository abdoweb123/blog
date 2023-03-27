<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;

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


Route::get('/', function (){
    return redirect()->route('login');
});




Route::group(['prefix'=>'admin','middleware'=>'auth'],function () {
    Route::get('/all/posts', [PostController::class,'index'])->name('admin_index');
    Route::get('/create/post', [PostController::class,'create'])->name('post_create');
    Route::post('/store', [PostController::class,'store'])->name('post_create');
    Route::get('/edit/{id}', [PostController::class,'edit'])->name('post_edit');
    Route::put('/update/{id}', [PostController::class,'update'])->name('post_create');
    Route::get('/soft/delete/{id}', [PostController::class,'destroy'])->name('post_create');
    Route::get('/post/{id}', [PostController::class,'show'])->name('show_post');

    // comments
    Route::post('/store/comment', [CommentController::class,'store'])->name('store_comment');
    Route::get('/soft/delete/comment/{id}', [CommentController::class,'destroy'])->name('post_delete');
});


// Not Found Page
Route::get('/Not-Found', function (){return view('errors.404_page');})->name('not_found');
