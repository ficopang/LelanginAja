<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth');
Route::get('/', [UserController::class, 'showUsers']);

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/about', function () {
    return view('about-us');
})->name('about-us');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/login', [AuthController::class, 'customLogin']);
Route::post('/register', [AuthController::class, 'customRegistration']);
Route::get('/logout', [AuthController::class, 'signOut']);

Route::get('/product', function () {
    return view('product.product-grids');
})->name('product.grids');
Route::get('/product/list', function () {
    return view('product.product-list');
})->name('product.list');
Route::get('/product/manage', function () {
    return view('product.manage');
})->name('product.manage');
Route::get('/product/{id}/send', function () {
    return view('product.send');
})->name('product.send');
Route::get('/product/{id}', function () {
    return view('product.product-details');
})->name('product.details');
Route::get('/product/{id}/send', function () {
    return view('product.send');
})->name('product.send');


Route::get('/cart', function () {
    return view('product.cart');
})->name('cart');
Route::get('/checkout', function () {
    return view('product.checkout');
})->name('checkout');


Route::get('/account/chat', function () {
    return view('account.chat');
})->name('account.chat');
Route::get('/account/edit', function () {
    return view('account.edit');
})->name('account.edit');
Route::get('/account/transaction', function () {
    return view('transaction.history');
})->name('transaction.history');
Route::get('/account/withdraw', function () {
    return view('account.withdraw');
})->name('account.withdraw');

Route::get('/report', function () {
    return view('product.report');
})->name('report');
