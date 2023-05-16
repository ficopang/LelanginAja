<?php

<<<<<<< HEAD
use App\Http\Controllers\ProductController;
=======
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ChatController;
>>>>>>> 9aa6ff4a3d18751cce14df609b6c6def3730fd04
use App\Http\Controllers\UserController;
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
});
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

Route::post('/products', [ProductController::class, 'store'])->name('products.store');



Route::get('/cart', function () {
    return view('product.cart');
})->name('cart');
Route::get('/checkout', function () {
    return view('product.checkout');
})->name('checkout');

Route::get('/account/chat', [ChatController::class, 'openChatpage'])->name('account.chat');

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

Route::post('/report', [ReportController::class, 'submitReport'])->name('report');
