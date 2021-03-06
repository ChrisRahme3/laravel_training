<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class CreateProductsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Create the schema - Categories table needs to be created first
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name', 128);
            $table->text('description')->nullable();
            $table->text('features')->nullable();
            $table->double('price', 10, 2);
            $table->text('keywords')->nullable();
            $table->text('url')->nullable();
            //$table->string('category');
            $table->unsignedInteger('category_id');
            $table->string('subcategory', 32);
            
            //$table->foreign('category')->references('name')->on('categories')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
        
        // Get the categories as array
        $categories_collection = DB::table('categories')->get(); // returns an Illuminate\Support\Collection instance containing the results of the query where each result is an instance of the PHP stdClass object.
        $categories_array = $categories_collection->toArray();
        
        // Get the products JSON file
        $products_array = json_decode(Storage::get('./public/json/products.json'), true)['products']['data']['items'];
        
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }
}
