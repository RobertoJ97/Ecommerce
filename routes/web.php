<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;




Route::get('/dashboard',[HomeController::class,'home'])->middleware(['auth','admin'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin'])->name('home.index');
Route::get('admin/dashboard/product',[ProductController::class,'index'])->middleware(['auth','admin'])->name('product.index');
Route::post('admin/dashboard/product',[ProductController::class,'store'])->middleware(['auth','admin'])->name('product.store');
Route::get('admin/dashboard/category',[CategoryController::class,'index'])->middleware(['auth','admin'])->name('category.index');
Route::post('admin/dashboard/category',[CategoryController::class,'store'])->middleware(['auth','admin'])->name('category.store');
Route::delete('admin/dashboard/category/{id}',[CategoryController::class,'destroy'])->middleware(['auth','admin'])->name('category.destroy');
Route::delete('admin/dashboard/product/{id}',[ProductController::class,'destroy'])->middleware(['auth','admin'])->name('product.destroy');
//Route::resource('/categories', CategoryController::class);
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('product_details/{id}',[HomeController::class,'product_details']);
Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth','verified']);
Route::get('myCart',[HomeController::class,'myCart'])->middleware(['auth','verified']);
Route::get('checkout',[OrderController::class,'checkout'])->middleware(['auth','verified']);
Route::get('order',[OrderController::class,'list'])->middleware(['auth','admin'])->name('order.list');
Route::post('pay',[OrderController::class,'pay'])->middleware(['auth','verified'])->name('order.pay');
Route::get('on_way/{id}',[OrderController::class,'on_way'])->middleware(['auth','verified'])->name('order.on_way');
Route::get('delivered/{id}',[OrderController::class,'delivered'])->middleware(['auth','verified'])->name('order.delivered');
Route::get('pdf/{id}',[OrderController::class,'pdf'])->middleware(['auth','verified'])->name('order.invoice');

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{amount}','stripe')->name('home.stripe');
    Route::post('stripe/{amount}', 'stripePost')->name('stripe.post');
});

