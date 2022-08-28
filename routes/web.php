<?php

use App\Models\Category;
use App\Mail\CategoryCreateMarkdown;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\SubCategoryController;

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

Route::get('/', [FrontController::class, 'home'])->name('home');

Route::get('/about-us', [FrontController::class, 'about'])->name('about');

Route::get('/contact-page', [FrontController::class, 'contact'])->name('contact');

Route::get('/service-page', [FrontController::class, 'service'])->name('service');

Route::get('/send-me-details', UserInfoController::class)->name('sendmedetails');

Route::resource('/category', CategoryController::class);
Route::get('/category/{category_id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
Route::get('/category/{category_id}/forcedelete', [CategoryController::class, 'forceDelete'])->name('category.forcedelete');
Route::resource('/subcategory', SubCategoryController::class);

Route::get('books', [FrontController::class, 'books']);
Route::get('positions', [FrontController::class, 'positions']);


Route::resource('/products', ProductController::class);

Route::get('/phpinfo', function() {
    return phpinfo();
});

Route::get('mail-preview', function(){
    $category=Category::find(1);
    return new CategoryCreateMarkdown($category);
});
