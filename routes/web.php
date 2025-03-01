<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [MainController::class, 'scrape']);

Route::get('/', [MainController::class, 'index']);

Route::get('/about', [MainController::class, 'about']);

Route::get('/wishlist', [MainController::class, 'wishlist']);

Route::get('/cart', [MainController::class, 'cart'])-> middleware('isLoggedIn');
Route::post('/add-to-cart', [MainController::class, 'addToCart']);
Route::get('/remove-from-cart/{id}', [MainController::class, 'removeFromCart']) -> middleware('isLoggedIn');

Route::get('/checkout', [MainController::class, 'checkout']) -> middleware('isLoggedIn');
Route::post('/delivery-address', [MainController::class, 'postDeliveryAddress']);

Route::get('/contact', [MainController::class, 'contact']) -> middleware('isLoggedIn');

Route::get('/men', [MainController::class, 'men']) -> middleware('isLoggedIn');

Route::get('/order-complete', [MainController::class, 'orderComplete']);

Route::get('/product-detail/{id}', [MainController::class, 'productDetail']);

Route::get('/women', [MainController::class, 'women']) -> middleware('isLoggedIn');

Route::get('/signup', [AuthController::class, 'signup']);
Route::post('/signup', [AuthController::class, 'postSignup']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/logout', [AuthController::class, 'logout']) -> middleware('isLoggedIn');

Route::get('/account', [AuthController::class, 'account']) -> name('account') -> middleware('isLoggedIn');

Route::post('/order', [MainController::class, 'addToOrder']);



Route::get('/dashboard', [MainController::class, 'dashboard']);

Route::get('/products', [MainController::class, 'product']);
Route::post('/product', [MainController::class, 'postProducts']) -> name('product');
Route::get('/delete-product/{id}', [MainController::class, 'delete']) -> name('delete-product');


Route::get('/customers', [MainController::class, 'customer']);

Route::get('/orders', [MainController::class, 'order']) -> name('order');


