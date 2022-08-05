<?php

namespace Database\Seeders;

use App\Models\Socialite;
use Illuminate\Database\Seeder;

class SocialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Socialite::create([
            'client_id' => '336697325185-ekp18n4juphj2g8ksg444mbi9b79q7ns.apps.googleusercontent.com',
            'client_secret' => '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',
            'redirect' => 'http://localhost:8000/google/callback',
        ]);
    }
}
