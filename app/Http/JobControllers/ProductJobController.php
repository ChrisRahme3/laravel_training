<?php

namespace App\Http\JobControllers;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductJobController extends Controller {
    // Imports JSON file to database
    static public function importJson($path) {
        // Get the categories as array
        $categories_import = json_decode((new CategoryController())->index(), true);
		$categories_array = [];

		for ($row_number = 0; $row_number < count($categories_import); $row_number++) {
			$categories_array[] = $categories_import[$row_number]['name'];
		}

        // Get the products JSON file
        $products_array = json_decode(Storage::get($path), true)['products']['data']['items'];

        // Replace the category with its ID in the products JSON
        for ($row_number = 0; $row_number < count($products_array); $row_number++) {
            $product = $products_array[$row_number];
            $category_id = array_search($product['category'], $categories_array); // Index of the category

            // Create `code` key and remove `id` (which will get auto-incremented)
            $product['code'] = $product['id'];
            unset($product['id']);

            // Create `category_id` key and remove `category`
            $product['category_id'] = $category_id + 1;
            unset($product['category']);

			// Add product to database
            DB::table('products')->insert(array($product));
        }
    }

	// Returns the View of all products
	public function index() {
		return view('products.index_vue');
	}

    // Returns the View of a single product
    public function show($id) {
        $product = (new ProductController())->show($id);

        return view('products.single_laravel', compact('product'));
    }
}
