<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = config('constants.db.roles');

        foreach ($roles as $key => $value) {
            Role::query()->create(['name' => $value]);
        }
    }
}
