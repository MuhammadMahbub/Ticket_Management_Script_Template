<?php

namespace Database\Seeders;

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
        $this->call([
            StatusSeeder::class,
            PrioritySeeder::class,
            UserRoleSeeder::class,
            AdminSeeder::class,
            Departmentseeder::class,
            TicketSeeder::class,
            NavigationSeeder::class,
            SocialiteSeeder::class,
            LoginSeeder::class,
            RegisterSeeder::class,
            ReplySeeder::class,
            ColorSettingSeeder::class,
            GeneralSettingSeeder::class,
        ]);
    }
}
