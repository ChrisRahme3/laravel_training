<?php

namespace App\Http\Controllers;

use App\Http\JobControllers\ProductJobController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    static public function index() {
        return Product::all();
    }

    static public function show($id) {
        return Product::find($id);
    }
}
