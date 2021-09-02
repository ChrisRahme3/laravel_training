<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class CreateCategoriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32);
        });
        
        $categories_array = json_decode(Storage::get('./public/json/categories.json'), true);
        
        for ($row_number = 0; $row_number < count($categories_array); $row_number++) {
            $category = $categories_array[$row_number];
            
            DB::table('categories')->insert(array(
                'id' => $row_number + 1,
                'name' => $category
            ));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('categories');
    }
}
