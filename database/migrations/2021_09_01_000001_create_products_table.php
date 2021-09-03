<?php

use App\Http\JobControllers\ProductJobController;
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
            $table->increments('id');
            $table->string('code');
            $table->string('name', 128);
            $table->text('description')->nullable();
            $table->text('features')->nullable();
            $table->double('price', 10, 2);
            $table->text('keywords')->nullable();
            $table->text('url')->nullable();
            //$table->string('category');
            $table->unsignedInteger('category_id');
            $table->string('subcategory', 32)->nullable();
            
            //$table->foreign('category')->references('name')->on('categories')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
        
        ProductJobController::importJson('./public/json/products.json');
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
