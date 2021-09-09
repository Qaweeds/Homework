<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(OrderStatusSeeder::class);

        User::factory(20)->create();

        Category::factory(10)->create()->each(function ($cat) {
            Product::factory(rand(5, 10))->state(['category_id' => $cat->id])->create()->each(function ($product) {
                ProductImage::factory(rand(1, 3))->state(['product_id' => $product->id])->create();
            });
        });

        Order::factory(100)->create();
    }
}
