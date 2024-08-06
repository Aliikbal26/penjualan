<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\InventoryTransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyGuestMiddleware;
use App\Http\Middleware\OnlyMemberMiddleware;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('template.login', [
        'title' => 'Login'
    ]);
})->middleware([OnlyGuestMiddleware::class]);
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware([OnlyGuestMiddleware::class]);
Route::post('/register', [UserController::class, 'doRegister'])->name('register')->middleware([OnlyGuestMiddleware::class]);
Route::post('/login', [UserController::class, 'doLogin'])->name('login')->middleware([OnlyGuestMiddleware::class]);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware([OnlyGuestMiddleware::class]);
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware([OnlyMemberMiddleware::class]);
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware([OnlyMemberMiddleware::class]);
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard')->middleware([OnlyMemberMiddleware::class]);
Route::get('/inputProduct', [ProductController::class, 'inputProduct'])->name('inputProduct')->middleware([OnlyMemberMiddleware::class]);
Route::post('/product', [ProductController::class, 'addProduct'])->name('addProduct')->middleware([OnlyMemberMiddleware::class]);
Route::get('/product', [ProductController::class, 'index'])->name('product')->middleware([OnlyMemberMiddleware::class]);
Route::post('/product/{id}', [ProductController::class, 'edit'])->name('edit')->middleware([OnlyMemberMiddleware::class]);
Route::put('/product/{id}', [ProductController::class, 'editProduct'])->name('editProduct')->middleware([OnlyMemberMiddleware::class]);
Route::delete('/product/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct')->middleware([OnlyMemberMiddleware::class]);


Route::get('/cart', [CartController::class, 'shopingCart'])->name('cart')->middleware([OnlyMemberMiddleware::class]);
Route::post('/cart', [CartController::class, 'addShopingCart'])->name('cart')->middleware([OnlyMemberMiddleware::class]);
Route::post('/cartCart', [CartController::class, 'deleteShopingCart'])->name('deleteCart')->middleware([OnlyMemberMiddleware::class]);
Route::get('/checkOut', [CartController::class, 'checkOut'])->name('checkOut')->middleware([OnlyMemberMiddleware::class]);
Route::post('/checkOut', [CartController::class, 'checkOut'])->name('checkOut')->middleware([OnlyMemberMiddleware::class]);
Route::post('/order', [InventoryTransactionController::class, 'payment'])->name('payment')->middleware([OnlyMemberMiddleware::class]);
