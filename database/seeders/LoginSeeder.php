<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoginPage;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoginPage::create([
            'title'           => "Login to Support Ticket System",
            'subtitle'        => "if you are registered user, then press your valid email address and password.",
            'img_title'       => "WelCome To Support Ticketing System",
            'img_subtitle'    => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.",
            'image'           => "login.svg",
        ]);
    }
}
