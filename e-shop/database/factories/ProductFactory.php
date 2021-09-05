<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
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
    public function definition()
    {
        $category = Category::query()->inRandomOrder()->first();

        return [
            'category_id' => $category->id,
            'title' => $this->faker->unique->text(30),
            'description' => $this->faker->sentence(100),
            'short_description' => $this->faker->text(150),
            'SKU' => $this->faker->text(35),
            'price' => $this->faker->randomFloat(null, 1, 10000),
            'discount' => (rand(1, 6) < 4) ? rand(1, 5) * 10 : null,
            'in_stock' => (rand(0, 100) < 100) ? rand(1, 1000) : 0,
            'thumbnail' => '111'
        ];

    }
}
