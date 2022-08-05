<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class Departmentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Web Design',
            'user_id' => json_encode(['2']),
            'role_id' => 2,
        ]);

        Department::create([
            'name' => 'Web Development',
            'user_id' => json_encode(['2']),
            'role_id' => 2,
        ]);

        Department::create([
            'name' => 'Graphics Design',
        ]);
    }
}
