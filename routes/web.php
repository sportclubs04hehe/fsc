<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Admin logout
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'Logout'])->name('admin.logout');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//Send Mail Confirm Account
Route::get('sendMail/confirm',[\App\Http\Controllers\Backend\Mail\MailConfirmAccountController::class,'sendmail']);

//Category
Route::prefix('Admin')->middleware('auth')->name('category.')->group(function (){
    Route::get('/category/index',[\App\Http\Controllers\Backend\CategoryController::class,'index']);
    Route::get('/category/create',[\App\Http\Controllers\Backend\CategoryController::class,'create']);
    Route::post('/category/store',[\App\Http\Controllers\Backend\CategoryController::class,'store'])->name('store');
    Route::get('/category/edit/{id}',[\App\Http\Controllers\Backend\CategoryController::class,'edit'])->name('edit');
    Route::post('/category/update/{id}',[\App\Http\Controllers\Backend\CategoryController::class,'update'])->name('update');
    Route::get('/category/delete/{id}',[\App\Http\Controllers\Backend\CategoryController::class,'delete'])->name('delete');
});

//SubCategory
Route::prefix('Admin')->middleware('auth')->name('subcategory.')->group(function (){
    Route::get('/subcategory/index',[\App\Http\Controllers\Backend\SubCategoryController::class,'index']);
    Route::get('/subcategory/create',[\App\Http\Controllers\Backend\SubCategoryController::class,'create']);
    Route::post('/subcategory/store',[\App\Http\Controllers\Backend\SubCategoryController::class,'store'])->name('store');
    Route::get('/subcategory/edit/{id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'edit'])->name('edit');
    Route::post('/subcategory/update/{id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'update'])->name('update');
    Route::get('/subcategory/delete/{id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'delete'])->name('delete');
});


