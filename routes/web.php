<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [ProductController::class, 'home']);

Route::get('/products', [ProductController::class, 'viewProducts']);

Route::get('/edit/{id}', [ProductController::class, 'edit']);

Route::post('/store', [ProductController::class, 'store']);

Route::patch('/update/{id}', [ProductController::class, 'update']);

Route::delete('/delete/{id}', [ProductController::class, 'delete']);

Route::get('/create-category', [CategoryController::class, 'create']);

Route::get('/category', [CategoryController::class, 'index']);

Route::post('/category-store', [CategoryController::class, 'store']);

Route::delete('/category-delete/{id}', [CategoryController::class, 'delete']);
