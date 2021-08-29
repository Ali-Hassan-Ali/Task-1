<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\CategoryController;
use App\Http\Controllers\Home\ProductController;
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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {

    Route::get('/', function () {
        return view('home.welcome');
    });

    //demo_category routes
    Route::get('/demo_category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category_id/{id}', [CategoryController::class, 'show'])->name('category.show');

    //demo_category routes
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::delete('product.delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

        
});//LaravelLocalization
