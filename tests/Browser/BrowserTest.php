<?php

namespace Tests\Browser;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BrowserTest extends DuskTestCase {
    use DatabaseMigrations;

    public function test_laravel_single_product_page() {
        $this->browse(function (Browser $bro) {
			$product = Product::factory()->create();

            $bro->visit('/product/'.$product->id)
				->screenshot('test_laravel_single_product_page')
				->assertSeeLink('Back')
				->assertSee('Category')
				->assertSee($product->code);
        });
    }

	public function test_laravel_single_product_page_back_button() {
		$this->browse(function (Browser $bro) {
			$product = Product::factory()->create();

            $bro->visit('/product/'.$product->id)
				->clickLink('Back')
				->pause(1000)
				->screenshot('test_laravel_single_product_page_back_button')
				->assertSee('Products')
				->assertVisible('#products-index')
				->assertNotPresent('#products-single')
				->assertSee($product->name);
        });
	}

	public function test_vue_index_product_page_card_button() {
		$this->browse(function (Browser $bro) {
			$product = Product::factory()->create();

            $bro->visit('/products/index_vue/')
				->pause(1000)
				->click('#product-card-'.$product->id.' button')
				->screenshot('test_vue_index_product_page_card_button')
				->assertVisible('#product-single')
				->assertNotPresent('#products-grid')
				->assertSee('Category')
				->assertSee($product->code)
				->pause(1000)
				->assertVue('product.name', $product->name);
        });
	}
}
