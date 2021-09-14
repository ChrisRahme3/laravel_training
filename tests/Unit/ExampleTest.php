<?php

namespace Tests\Unit;

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ExampleTest extends TestCase {
	use RefreshDatabase;

    // public function test_example() {
    //     $this->assertTrue(true);
    // }

	public function test_product_factory_works() {
		$fake_product = Product::factory()->make(
			['id' => 1000]
		);

		$this->assertEquals($fake_product->id, 1000);
	}

	public function test_get_product_id() {
		for ($i = 1; $i <= 3; $i++) {
			$product = json_decode(file_get_contents('http://127.0.0.1:8000/api/products/'.$i));
			$this->assertEquals($product->id, $i);
		}
	}
}
