<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
})->name('home'); //Elementary route

Route::get('/catalog', [BookController::class, 'index'])->name('catalog'); //Show catalog

Route::get('/catalog/{id}', [BookController::class, 'show'])->name('single_book'); //Show one specific book

Route::middleware('auth')->group(function () { //Only loged in users can access to this parts of the application

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); //Logout user

    Route::get('/cart', [CartController::class, 'index'])->name('cart'); //Show user cart

    Route::post('/cart/{id}', [CartController::class, 'store'])->name('cart.store'); //Add item to the cart

    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy'); //Delete cart item

    Route::get('/checkout', [OrderController::class, 'index'])->name('checkout'); //Show checkout page

    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store'); //Place an order

    Route::get('/my_orders', [OrderController::class, 'my_orders'])->name('my_orders'); //Show user's orders
});

Route::middleware('guest')->group(function () { //Only guests can access to this parts of the application

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); //Show register form

    Route::post('/register', [AuthController::class, 'store'])->name('register.store'); //Register user

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); //Show login form

    Route::post('/login', [AuthController::class, 'login'])->name('login.store'); //Login user
});