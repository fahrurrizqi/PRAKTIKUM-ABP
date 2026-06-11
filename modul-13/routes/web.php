<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () { 
    if (Auth::check()) return redirect('/product'); 
    return view('login'); 
})->name('login'); 

Route::post('/login', [SiteController::class, 'auth']);

Route::get('/logout', function () { 
    Auth::logout(); 
    return redirect('/login'); 
}); 

Route::post('/product/{product}/variant', [ProductController::class, 'storeVariant'])->name('product.variant.store')->middleware('auth');

Route::resource('product', ProductController::class)->middleware('auth');
