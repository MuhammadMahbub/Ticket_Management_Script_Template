<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ColorSetting;

class ColorSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ColorSetting::create([
            'theme_color'  => '#472696',
        ]);
    }
}
