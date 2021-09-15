<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase {
	use RefreshDatabase;

    public function test_home_route() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

	public function test_category_structure() {
        $this->get('/api/categories/1')->assertJsonStructure([
			'id',
			'name'
		]);
    }

	public function test_product_structure() {
        $this->get('/api/products/1')->assertJsonStructure([
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
}
