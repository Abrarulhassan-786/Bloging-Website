<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/category',[CategoryController::class,'index']);
    Route::get('/add_category', [CategoryController::class, 'create'])->name('admin.add_category');
    Route::post('/add_category', [CategoryController::class,'store']);
    Route::get('/edit_category/{id}',[CategoryController::class,'edit'])->name('admin.edit_category');
    Route::put('/updatecategory/{id}',[CategoryController::class,'update'])->name('admin.updatecategory');
    Route::get('/delete_category/{id}',[CategoryController::class,'destroy'])->name('admin.delete_category');

    // Post Controller Route
    Route::get('view_post',[PostController::class,'index'])->name('admin.view_post');
    Route::get('add_post',[PostController::class,'create'])->name('admin.add_post');
    Route::post('add_post',[PostController::class,'store'])->name('admin.add_post');
    Route::get('edit_post/{id}',[PostController::class,'edit'])->name('admin.edit_post');
    Route::put('update_post/{id}',[PostController::class,'update'])->name('admin.update_post');
    Route::get('delete_postrecord/{id}',[PostController::class,'destroy'])->name('delete_postrecord');
});
