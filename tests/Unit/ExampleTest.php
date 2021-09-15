<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase {
	use RefreshDatabase;

	public function test_product_factory_works() {
		$product = Product::factory()->make(
			['id' => 1000]
		);

		$this->assertEquals($product->id, 1000);
	}

	public function test_get_product_id() {
		for ($i = 1; $i <= 3; $i++) {
			$product = json_decode(file_get_contents('http://127.0.0.1:8000/api/products/'.$i));
			$this->assertEquals($product->id, $i);
		}
	}

	public function test_product_belongs_to_category() {
		$product = Product::factory()->make();

		$this->assertInstanceOf(Category::class, $product->category);
	}
}
