<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {return redirect('/home');});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->resource('/products', ProductsController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');

Route::get('/profile', ProfileController::class)->name('profile');
Auth::routes();
Route::fallback(FallbackController::class);
