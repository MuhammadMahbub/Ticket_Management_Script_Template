<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Open',
        ]);

        Status::create([
            'name' => 'Pending',
        ]);


        Status::create([
            'name' => 'Closed',
        ]);
    }
}
