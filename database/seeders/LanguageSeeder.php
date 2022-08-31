<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'English',
            'short_name' => 'en',
            'flag'  => 'en.png',
        ]);

        Language::create([
            'name' => 'French',
            'short_name' => 'fr',
            'flag'  => 'fr.png',
        ]);

        Language::create([
            'name' => 'Bangla',
            'short_name' => 'bd',
            'flag'  => 'bd.png',
        ]);

    }
}
