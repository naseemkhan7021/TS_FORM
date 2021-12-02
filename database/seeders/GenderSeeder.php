<?php

namespace Database\Seeders;

use App\Models\common\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create(
            ['gender_description' => 'Male', 'gender_abbr' => 'M']
        );
        Gender::create(
            ['gender_description' => 'Female', 'gender_abbr' => 'F']
        );
        Gender::create(
            ['gender_description' => 'Trans Gender', 'gender_abbr' => 'TG']
        );
    }
}
