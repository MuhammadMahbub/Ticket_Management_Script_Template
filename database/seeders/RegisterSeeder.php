<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegisterPage;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegisterPage::create([
            'title'           => "Register to Support Ticket System",
            'subtitle'        => "if you are not registerd user, then please enter your valid information for registration.",
            'img_title'       => "WelCome To Support Ticketing System",
            'img_subtitle'    => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.",
            'image'           => "register.svg",
        ]);
    }
}
