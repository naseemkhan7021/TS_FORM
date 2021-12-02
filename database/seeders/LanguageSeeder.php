<?php

namespace Database\Seeders;

use App\Models\common\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create(
            ['language_description' => 'English', 'language_abbr' => 'ENG']
        );
        Language::create(
            ['language_description' => 'Hindi', 'language_abbr' => 'HIN']
        );
        Language::create(
            ['language_description' => 'Marathi', 'language_abbr' => 'MAR']
        );
        Language::create(
            ['language_description' => 'Gujrati','language_abbr' => 'GUJ']
        );
        Language::create(
            ['language_description' => 'Konkani','language_abbr' => 'KON']
        );
    }
}
