<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Navigation;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::create([
            'name' => 'Tickets',
            'icon' => '<i class="fa-solid fa-ticket"></i>',
            'route' => 'ticket.index',
        ]);

        Navigation::create([
            'name' => 'User Role',
            'icon' => '<i class="fa-solid fa-person-circle-plus"></i>',
            'route' => 'user_role.index',
        ]);

        Navigation::create([
            'name' => 'Users',
            'icon' => '<i class="fa-solid fa-users"></i>',
            'route' => 'users.index',
        ]);

        Navigation::create([
            'name' => 'Priority',
            'icon' => '<i class="fa-solid fa-ranking-star"></i>',
            'route' => 'priority.index',
        ]);

        Navigation::create([
            'name' => 'Status',
            'icon' => '<i class="fa-solid fa-signal"></i>',
            'route' => 'status.index',
        ]);

        Navigation::create([
            'name' => 'Departments',
            'icon' => '<i class="fa-solid fa-building-user"></i>',
            'route' => 'department.index',
        ]);

        Navigation::create([
            'name' => 'Update Language',
            'icon' => '<i class="fa-solid fa-edit"></i>',
            'route' => 'lang_edit',
        ]);

        Navigation::create([
            'name' => 'Download Json File',
            'icon' => '<i class="fa-solid fa-download"></i>',
            'route' => 'json_file_download',
        ]);

        Navigation::create([
            'name' => 'Register Page',
            'icon' => '<i class="fa-solid fa-registered"></i>',
            'route' => 'register_page.index',
        ]);

        Navigation::create([
            'name' => 'Login Page',
            'icon' => '<i class="fa-solid fa-arrow-right-to-bracket"></i>',
            'route' => 'login_page.index',
        ]);

        Navigation::create([
            'name' => 'Navigation',
            'icon' => '<i class="fa-solid fa-bars"></i>',
            'route' => 'navigation.index',
        ]);

        Navigation::create([
            'name' => 'Color Settings',
            'icon' => '<i class="fa-solid fa-fill-drip"></i>',
            'route' => 'colorSettings.index',
        ]);

        Navigation::create([
            'name' => 'General Settings',
            'icon' => '<i class="fa-solid fa-font-awesome"></i>',
            'route' => 'generalSettings.index',
        ]);
        
    }
}
