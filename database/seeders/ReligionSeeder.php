<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\common\Religion;


class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Religion::create(
            ['religion_description' => 'Muslim', 'religion_abbr' => 'MUS']
        );
        Religion::create(
            ['religion_description' => 'Hinduism ', 'religion_abbr' => 'HIN']
        );
        Religion::create(
            ['religion_description' => 'Christianity', 'religion_abbr' => 'CHR']
        );
        Religion::create(
            ['religion_description' => 'Sikhism','religion_abbr' => 'SIKH']
        );
        Religion::create(
            ['religion_description' => 'Jainism','religion_abbr' => 'JAIN']
        );
        Religion::create(
            ['religion_description' => 'Buddhism','religion_abbr' => 'BUD']
        );
    }
}
