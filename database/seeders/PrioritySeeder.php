<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::create([
            'name' => "High",
        ]);

        Priority::create([
            'name' => "Medium",
        ]);

        Priority::create([
            'name' => "Low",
        ]);
    }
}
