<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeatureTest extends TestCase {
	use RefreshDatabase;

    public function test_home_route() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

	public function test_category_structure() {
        $response = $this->get('/api/categories/1');

		$response->assertStatus(200);
		$response->assertJsonStructure([
			'id',
			'name'
		]);
    }

	public function test_product_structure() {
		$product = Product::factory()->create();
        $response = $this->get('/api/products/'.$product->id);

		$response->assertStatus(200);
		$response->assertJsonStructure([
			'id',
			'code',
			'name',
			'description',
			'features',
			'price',
			'keywords',
			'category_id',
			'subcategory'
		]);
    }

	public function test_product_page_has_product_name() {
		$product = Product::factory()->create();
		$response = $this->get('/product/'.$product->id);

		$response->assertStatus(200);
		$response->assertSee($product->name);
	}
}
