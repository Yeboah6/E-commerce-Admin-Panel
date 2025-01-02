<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [MainController::class, 'scrape']);

Route::get('/', [MainController::class, 'index']);

Route::get('/about', [MainController::class, 'about']);

Route::get('/wishlist', [MainController::class, 'wishlist']);

Route::get('/cart', [MainController::class, 'cart']);
Route::post('/add-to-cart', [MainController::class, 'addToCart']) -> middleware('isLoggedIn');
Route::get('/remove-from-cart/{id}', [MainController::class, 'removeFromCart']) -> middleware('isLoggedIn');

Route::get('/checkout', [MainController::class, 'checkout']);

Route::get('/contact', [MainController::class, 'contact']);

Route::get('/men', [MainController::class, 'men']);

Route::get('/order-complete', [MainController::class, 'orderComplete']);

Route::get('/product-detail/{id}', [MainController::class, 'productDetail']);

Route::get('/women', [MainController::class, 'women']);

Route::get('/signup', [AuthController::class, 'signup']);
Route::post('/signup', [AuthController::class, 'postSignup']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/logout', [AuthController::class, 'logout']) -> middleware('isLoggedIn');
