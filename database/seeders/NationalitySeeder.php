<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\common\Nationality;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nationality::create(
            ['nationality_description' => 'Indian', 'nationality_abbr' => 'IND']
        );
        Nationality::create(
            ['nationality_description' => 'Bangladeshi', 'nationality_abbr' => 'BAN']
        );

    }
}
