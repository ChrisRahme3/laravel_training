<?php

namespace App\Http\JobControllers;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductJobController extends Controller {
    static public function importJson($path) {
        // Get the categories as array
        //$categories_collection = DB::table('categories')->get(); // returns Illuminate\Support\Collection of stdClass
        //$categories_array = $categories_collection->toArray();
        $categories_array = json_decode((new CategoryController())->index(), true);
        
        // Get the products JSON file
        $products_array = json_decode(Storage::get($path), true)['products']['data']['items'];
        
        // Replace the category with its ID in the products JSON
        for ($row_number = 0; $row_number < count($products_array); $row_number++) {
            $product = $products_array[$row_number];
            $category_id = array_search($product['category'], $categories_array); // Index of the category

            // Create `category_id` key and remove `category`
            $product['category_id'] = $category_id + 1;
            unset($product['category']);

            // Add product to database
            DB::table('products')->insert(array($product));
        }
    }

    static public function fill(Request $request, Product $product) {
        $request->validate([
            'id'          => 'required',
            'name'        => 'required|max:128',
            //'description' => ,
            //'features'    => ,
            'price'       => 'required',
            //'keywords'    => ,
            //'url'         => ,
            'category_id' => 'required',
            'subcategory' => 'max:32'
        ]);
        
        $product->id          = $request->id;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->features    = $request->features;
        $product->price       = $request->price;
        $product->keywords    = $request->keywords;
        $product->url         = $request->url;
        $product->category_id = $request->category_id;
        $product->subcategory = $request->subcategory;
        
        return $product;
    }
}
