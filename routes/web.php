<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WithdrawController;
use App\Models\Transaction;
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

Route::get('/', [ProductController::class, 'showProduct'])->name('index');
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

Route::get('/product', function () {
    return view('product.product-grids');
})->name('product.grids');
Route::get('/product/list', function () {
    return view('product.product-list');
})->name('product.list');
Route::get('/product/manage', [ProductController::class, 'index'])->name('product.manage');
Route::get('/product/{productId}', [ProductController::class, 'detail'])->name('product.details');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'signOut']);

    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/manage', [ProductController::class, 'manage'])->name('products.manage');

    Route::get('/cart', function () {
        return view('product.cart');
    })->name('cart');
    Route::get('/checkout', function () {
        return view('product.checkout');
    })->name('checkout');

    Route::get('/account/chat', [ChatController::class, 'openChatPage'])->name('account.chat');

    Route::get('/account/chat/{chat_id}', [ChatController::class, 'openChatPage'])->name('account.chat');

    Route::post('/account/chat/{chat_id}', [ChatController::class, 'postChat']);

    Route::get('/account/', function () {
        return view('account.edit');
    })->name('account.edit');
    Route::get('/account/edit', [UserController::class, 'getUserData'])->name('account.edit');
    Route::post('/account/edit', [UserController::class, 'updateUserData'])->name('account.edit');
    Route::get('/account/edit/password', function () {
        return redirect('/account/edit');
    })->name('account.edit');

    Route::get('/acccount/transaction/{id}/send', function () {
        return view('transaction.send');
    })->name('transaction.send');
    Route::post('/account/edit/password', [UserController::class, 'updatePassword'])->name('account.edit');
    Route::delete('/account/delete', [UserController::class, 'deleteAccount'])->name('account.delete');

    Route::get('/account/transaction', [TransactionController::class, 'showTransactionHistory'])->name('transaction.history');

    Route::get('/account/withdraw', function () {
        return view('account.withdraw');
    })->name('account.withdraw');

    Route::get('/product/{productId}/report', [ReportController::class, 'index'])->name('report');
    Route::post('/product/{productId}/report', [ReportController::class, 'submitReport'])->name('report');

    Route::post('/product/{productId}/watchlist', [ProductController::class, 'toggleWatchlist'])->name('watchlist');
    Route::post('/product/{productId}/bid', [BidController::class, 'placeBid']);
    Route::post('/report', [ReportController::class, 'submitReport'])->name('report');

    Route::post('/account/withdraw', [WithdrawController::class, 'submitWithdraw'])->name('account');
    Route::get('/account/withdraw',[WithdrawController::class, 'index']);
    Route::post('/checkout',[TransactionController::class, 'saveShippingAddres']);
});
Route::get('/product/{productId}/info', [BidController::class, 'getProductInfo']);
