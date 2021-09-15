<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
			'code'        => $this->faker->text(10),
			'name'        => $this->faker->text(50),
			'description' => $this->faker->text(100),
			'features'    => $this->faker->text(100),
			'price'       => $this->faker->numberBetween(1, 100),
			'keywords'    => $this->faker->text(100),
			'category_id' => $this->faker->numberBetween(1, 6),
			'subcategory' => $this->faker->text(15)
        ];
    }
}
