<?php

namespace App\Http\Controllers;

use App\Http\JobControllers\CategoryJobController;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        return Category::all();
    }
 
    public function show($id) {
        return Category::find($id);
    }

    public function store(Request $request) {
        $category = CategoryJobController::fill($request, new Category());
        $category->save();

        return response()->json($category, 201); // Created
    }

    public function update(Request $request, $id) {
        $category = CategoryJobController::fill($request, Category::find($id));
        $category->save();

        return response()->json($category, 200); // OK
    }

    public function delete(Category $category) {
        $category->delete();

        return response()->json(null, 204); // No Content
    }
}
