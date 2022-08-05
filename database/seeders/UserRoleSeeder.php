<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;
class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'role' => "Admin",
            'permission' => json_encode(['1', '2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12', '13']),
        ]);

        UserRole::create([
            'role' => "Agent",
            'permission' => json_encode(['1']),
        ]);

        UserRole::create([
            'role' => "Customer",
            'permission' => json_encode(['1']),
        ]);

    }
}
