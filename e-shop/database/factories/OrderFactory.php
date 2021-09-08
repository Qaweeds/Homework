<?php

namespace Database\Factories;

use App\Models\Order;

use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;


    public function configure()
    {
        return $this->afterMaking(function (Order $order) {

        })->afterCreating(function(Order $order) {
            $this->addToPivot($order);
        });
    }

    public function definition()
    {
        $user = User::query()->inRandomOrder()->first();
        $status = OrderStatus::query()->inRandomOrder()->first();

        return [
            'status_id' => $status->id,
            'user_id' => $user->id,
            'name' => $user->name,
            'surname' => $user->surname,
            'phone' => $user->phone,
            'email' => $user->email,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'total' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }

    private function addToPivot(Order $order)
    {
        $rand = rand(1, 7);

        for ($i = 1; $i <= $rand; $i++) {
            $product = Product::query()->inRandomOrder()->first();
            $order->products()->newPivot([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => rand(1,10),
                'single_price' => $product->price
            ])->save();
        }
    }

}
