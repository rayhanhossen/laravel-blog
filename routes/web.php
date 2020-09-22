<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index'])->name('website.index');
Route::get('category/{slug}', [App\Http\Controllers\WebsiteController::class, 'category'])->name('website.category');
Route::get('post/{slug}', [App\Http\Controllers\WebsiteController::class, 'post'])->name('website.post');
Route::get('page/{slug}', [App\Http\Controllers\WebsiteController::class, 'page'])->name('website.page');
Route::get('contact', [App\Http\Controllers\WebsiteController::class, 'showContactForm'])->name('website.contact.show');
Route::post('contact', [App\Http\Controllers\WebsiteController::class, 'submitContactForm'])->name('website.contact.submit');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('pages', 'PageController');
    Route::resource('posts', 'PostController');
    Route::resource('galleries', 'GalleryController');
    
});