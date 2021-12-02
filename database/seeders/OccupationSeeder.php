<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\common\Occupations;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Occupations::create( ['occupation_description' => 'Farmer', 'occupation_abbr' => 'FMR'] );
        Occupations::create( ['occupation_description' => 'Fireman', 'occupation_abbr' => 'FRM'] );

    }


}
