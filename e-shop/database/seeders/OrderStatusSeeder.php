<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use App\Models\Role;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = config('constants.db.order_statuses');

        foreach ($statuses as $key => $value) {
            OrderStatus::query()->create(['name' => $value]);
        }
    }
}
