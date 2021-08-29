<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\WelcomeController;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        
        //welxome routes
        Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

        //products routes
        Route::resource('products', ProductController::class)->except(['show']);
        
        //categorys routes
        Route::resource('categorys', CategoryController::class)->except(['show']);

    }); //end of dashboard routes

});//LaravelLocalization
