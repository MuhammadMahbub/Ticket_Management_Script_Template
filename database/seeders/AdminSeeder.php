<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'phone' => '01868752464',
            'role_id' => 1,
            'permission' => json_encode(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13']),
            'email' => 'admin@admin.com',
            'password' => bcrypt('@@Bladepro@123@@'),
            'created_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Agent',
            'phone' => '01868752464',
            'role_id' => 2,
            'permission' => json_encode(['1']),
            'email' => 'agent@agent.com',
            'password' => bcrypt('@@Bladepro@123@@'),
            'created_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Customer',
            'phone' => '01868752464',
            'role_id' => 3,
            'permission' => json_encode(['1']),
            'email' => 'customer@customer.com',
            'password' => bcrypt('@@Bladepro@123@@'),
            'created_at' => Carbon::now(),
        ]);

    }
}
