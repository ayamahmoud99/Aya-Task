<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


route::get('/',[HomeController::class,'index']);

Route::group(['prefix' => 'carts','middleware' => 'auth:sanctum'], function ($router) {
    Route::post('/save_in_cart',  [CartController::class,'save_in_cart']);
    Route::post('/remove_cart',[CartController::class,'remove_cart'])->name('remove_cart');

});

Route::get('/show',[CartController::class,'show_cart'])->name('show_cart');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);
Route::group(['prefix'=>'products'],function (){
    route::get('/',[ProductController::class,'index'])->name('all.products');
    route::get('/create',[ProductController::class,'create'])->name('add.product');
    Route::post('/store',  [ProductController::class,'store'])->name('product.store');
    Route::get('/edit/{id}',  [ProductController::class,'edit'])->name('product.edit');
    Route::post('/update/{$id}',  [ProductController::class,'update'])->name('product.update');
    Route::delete('/delete/{id}',  [ProductController::class,'destroy'])->name('product.delete');
});






