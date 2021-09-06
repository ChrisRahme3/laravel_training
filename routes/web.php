<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\JobControllers\ProductJobController;
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
    return view('welcome');
});

Route::resources([
    'api/categories' => CategoryController::class,
    'api/products'   => ProductController::class,
    //'product'        => ProductJobController::class
]);

Route::get('/products', function () {
    return view('products.index_vue');
});

Route::get('/product/{id}', [
    ProductJobController::class, 'display'
]);

Route::get('{any}', function() {
    return view('products.index_vue');
})->where('any', '.*');