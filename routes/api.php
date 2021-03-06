<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', function() {
    return Category::all();
});

Route::get('categories/{id}', function($id) {
    return Category::find($id);
});

Route::get('products', function() {
    return Product::all();
});

Route::get('products/{id}', function($id) {
    return Product::find($id);
});