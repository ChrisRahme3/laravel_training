<?php

namespace App\Http\JobControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryJobController extends Controller {
    // Imports JSON file to database
    static public function importJson($path) {
        $categories_array = json_decode(Storage::get($path), true);
        
        for ($row_number = 0; $row_number < count($categories_array); $row_number++) {
            $category = $categories_array[$row_number];
            
            DB::table('categories')->insert(array(
                'id'   => $row_number + 1,
                'name' => $category
            ));
        }
    }

    // Used to insert and update
    static public function fill(Request $request, Category $category) {
        $request->validate([
            'name' => 'required|max:32'
        ]);

        $category->name = $request->name;
        
        return $category;
    }
}
