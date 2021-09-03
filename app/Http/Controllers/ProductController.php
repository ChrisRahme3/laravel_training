<?php

namespace App\Http\Controllers;

use App\Http\JobControllers\ProductJobController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        return Product::all();
    }
 
    public function show($id) {
        return Product::find($id);
    }

    public function store(Request $request) {
        $product = ProductJobController::fill($request, new Product());
        $product->save();

        return response()->json($product, 201); // Created
    }

    public function update(Request $request, $id) {
        $product = ProductJobController::fill($request, Product::find($id));
        $product->save();

        return response()->json($product, 200); // OK
    }

    public function delete(Product $product) {
        $product->delete();

        return response()->json(null, 204); // No Content
    }
}